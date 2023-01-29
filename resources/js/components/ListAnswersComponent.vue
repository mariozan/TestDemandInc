<template>
    <div>
    <button class="btn btn-primary" v-if="user_id != null" @click="goToPage('/new-answer/'+ blog_id )">New Answer</button>
    <hr>
    <table class="table">
        <thead>
            <tr>
            <th>Id</th>            
            <th>Blog Owner</th>
            <th>Replied By</th>
            <th>Text</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="item in items.data" :key="item.id"> 
                <td>{{ item.id }} </td>
                <td>{{ item.blog_owner }}</td>
                <td>{{ item.replied_by }}</td>
                <td>{{ item.text }}</td>
                <td><img v-bind:src="item.image" width="150" height="150"></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <pagination :data="items" @pagination-change-page="getAnswers"></pagination>
</div>
</template>

<script>
import pagination from 'laravel-vue-pagination'

    export default {
        components:{
            pagination
        },
        data() {
        return {
            items:{
                    type:Object,
                    default:null
            }
        }
    },
    props: {
            blog_id: {
                type: Number,
                default:null
            },
            user_id: {
                type: Number,
                default:null
            }
        },
    mounted() {
        this.getAnswers();
    },
    methods:{
        async getAnswers(page=1) {      
            await axios.get('/answer/'+ this.blog_id +'?page='+page).then(({data}) => {
                this.items = data;
                console.log(data)
            }).catch(error => console.log(error))
        },            
        goToPage(url){
            window.location.href = url
        }  
    }
    }
</script>
