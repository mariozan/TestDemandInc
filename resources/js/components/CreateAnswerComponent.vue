<template>
    <div>
        <form>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea v-model="text" cols="30" rows="10" class="text form-control" required></textarea>
        </div>

        <div class="form-group" id="appUpload">
            <label for="image">Image</label>
		    <input type="file" class="form-control" @change="uploadImage" name="image" id="image" accept="image/*" >
	    </div>
        <button type="reset" class="btn btn-primary"  @click="storeAnswer()">Submit</button>
      </form>
    </div>
</template>

<script>
    export default {
        data() {
        return {
            text: '',
            image: null,
            formData: new FormData()
        }
    },
    props: {
            user_id : {default: null},
            blog_id : {default: null}
    },
    methods:{
        async storeAnswer() {   
            if(this.text){   

                this.formData.append('text', this.text)
                this.formData.append('user_id', this.user_id)
                this.formData.append('blog_id', this.blog_id)

                const config = { headers: { 'Content-Type': 'multipart/form-data' } };

                console.log(this.formData)
                await axios.post('/answer', this.formData, config).then(({data}) => {
                    alert("saved successfully")
                }).catch((error) => { 
                    console.log(error)
                    alert("Error saving data")})
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
