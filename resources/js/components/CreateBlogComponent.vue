<template>
    <div>
        <form>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" v-model="title" placeholder="Enter Title" required>
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea v-model="text" cols="30" rows="10" class="text form-control" required></textarea>
        </div>

        <div class="form-group" id="appUpload">
            <label for="image">Image</label>
            <input type="file" class="form-control" @change="uploadImage" name="image" id="image" accept="image/*" >
	    </div>
        <button type="reset" class="btn btn-primary"  @click="storeBlog()">Submit</button>
      </form>
    </div>
</template>

<script>
    export default {
        data() {
        return {
            title: '',
            text: '',
            image: null,
            formData: new FormData()            
        }
    },
    props: {
            user_id: {
                type: Number,
                default:null
            }
    },
    methods:{
        async storeBlog() {   
            if(this.title && this.text){   
                this.formData.append('text', this.text)
                this.formData.append('user_id', this.user_id)
                this.formData.append('title', this.title)

                const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            await axios.post('/blog', this.formData, config).then(({data}) => {
                alert("saved successfully")
            }).catch(error => alert("Error saving data"))
        }else{
            alert("fill in the required fields")
        }
        },
        uploadImage (e) {
            let img = e.target.files[0]       
            this.formData.append('image', img)
        }
    }    
    }
</script>
