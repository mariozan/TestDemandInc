<template>
    <div>
    <button class="btn btn-primary" v-if="user_id != null" @click="goToPage('/new-blog')">New Blog</button>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Search" v-model="filter">
        </div>
        <div class="col-md-3">
            <button class="btn btn-success" @click="searchBlogs()">Search</button>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Owner</th>
            <th><a @click="sortBlogs()" href="#">Title</a></th>
            <th>Text</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="item in items.data" :key="item.id"> 
                <td>{{ item.id }} </td>
                <td>{{ item.username }} </td>
                <td>{{ item.title }}</td>
                <td>{{ item.text }}</td>
                <td><img v-bind:src="item.image" width="150" height="150"></td>
                <td>
                    <button class="btn btn-warning" @click="goToPage('/answers/'+ item.id )">Show Answers</button>
                    <button class="btn btn-success" @click="goToPage('/new-answer/'+ item.id )" v-if="user_id != null">New Answer</button>
                </td>
            </tr>
        </tbody>
    </table>

    <pagination :data="items" @pagination-change-page="getBlogs"></pagination>

</div>
</template>

<script>
    import pagination from 'laravel-vue-pagination'

    export default {
        components:{
            pagination
        },
        props: {
            user_id: {
                type: Number,
                default:null
            }
        },
        data() {
            return {
                items:{
                        type:Object,
                        default:null
                },
                sortReverse : false,
                filter: '',
                sort : false
            }
    },
    mounted() {
        this.getBlogs();
    },
    methods:{
        async getBlogs(page=1) {      
            await axios.get('/blog?page='+page).then(({data}) => {
                this.items = data;
            }).catch(error => console.log(error))
        },
        async searchBlogs() {      
            if(this.filter != ''){
                await axios.get('/blog?filter='+this.filter).then(({data}) => {
                    this.items = data;
                }).catch(error => console.log(error))
            }else{
                this.getBlogs()
            }
        },
        async sortBlogs(){
            const sort = this.sort ? 'ASC' : 'DESC'
            await axios.get('/blog?sort=' + sort).then(({data}) => {
                this.items = data;
            }).catch(error => console.log(error))

            this.sort = !this.sort
        },
        goToPage(url){
            window.location.href = url
        }
    }
    
    }
</script>
