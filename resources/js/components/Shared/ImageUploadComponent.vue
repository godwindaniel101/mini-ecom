<template>
    <div class="dropzone">
        <div class="layer layer_1">
            <input type="file" class="input_field" @change="uploadImage" /> 
        </div>
        <div class="layer layer_2" v-if="!uploaded">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-up-circle" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="8" y2="12" />
                            <line x1="12" y1="8" x2="12" y2="16" />
                            <line x1="16" y1="12" x2="12" y2="8" />
                          </svg>
                          Upload Image
        </div>
         <div class="cancel_photo" v-if="uploaded" @click="resetPhoto">
               <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="svg-inline--fa fa-times fa-w-11 fa-3x"><path fill="red" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" class=""></path></svg>
        </div>
        <div class="layer layer_3" v-if="uploaded">
            <img v-bind:src="photo_data" alt="error" >
        </div>
        
        
    </div>
</template>
<script>
import { dataTransfer } from "../../app";
//importing event bus needed to transfer image detail to parent component
export default {
    data(){return{
        uploaded:false,
        photo_data:"/image/default.png"
        }},
    methods:{
        resetPhoto(){
            //reset image field
            this.uploaded=false
            this.photo_data="";
            dataTransfer.$emit('photoUpdated', this.photo_data)
        },
        imageCheck(file){
            var Size = file['size']
            var Filename = file['name']
            var Extension =  Filename.split('.').pop();
         //validate image size and type
            if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {
                if(Size < 2097152){
                             return true
                        }
                        else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Image Size Too Large!',
                            })
                            return false
                        }
                }else{
                     Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Image Type',
                            })
                    return false
                }
        },
        uploadImage(element){
            //coverstion of photo to base 64, for easier transfer
            let file = element.target.files[0];
             var reader = new FileReader();
             if(this.imageCheck(file)){
                reader.onloadend = (file) => {
                    
                    this.photo_data = reader.result
                    this.uploaded = true;
                    dataTransfer.$emit('photoUpdated', this.photo_data)
                    //photo data is emitted to parent component on change
                    }    
                }
              reader.readAsDataURL(file);
            },
            editModePhoto(imagename){
                this.photo_data = imagename
                this.uploaded = true;
                //setting a preview of old image
            }
    },
    created(){
        dataTransfer.$on("resetProduct", () => {
            this.resetPhoto();
            //reset instruction
        });
        dataTransfer.$on("photoEditMode", (imagename) => {
            this.editModePhoto(imagename);
        });
        
    }
}
</script>
<style scoped>
.dropzone{
    height: 300px;
    padding:10px;
    position:relative;
    width:100%;
    display:flex;
    align-items: center;
    justify-content: center;
    cursor:pointer;
    outline:2px dashed grey;
    outline-offset:-10px;
    /* background:rgb(228, 228, 240); */
    color:grey;
    overflow:hidden;
}
.layer{
    position:absolute;
    overflow:hidden;
    display:flex;
    align-items: center;
    justify-content: center;
    width:90%;
    height:90%;
}
.layer_3 , .layer_2{
    z-index:1;
}
.layer_3 img{
    width:100%;
    height:auto;
    margin:auto;
}
 .cancel_photo{
    position: absolute;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    top: 10px;
    align-items: center;
    /* border: 1px solid red; */
    right: 10px;
    z-index:50;

}
.layer_1{
     z-index:5;
     background:none;
}
.input_field{
    opacity:0;
    z-index:1;
    width:100%;
    height:100%;
    /* border:1px solid green; */
    cursor: pointer;
    position:absolute
}
.uploaded{
    opacity:0;
    z-index:20;
    width:100%;
    height:200px;
    cursor: pointer;
    position:absolute
}
.dropzone:hover{
      background:rgb(244, 244, 248)
}
.call-to-action{
    font-size:1.2rem
}
</style>
