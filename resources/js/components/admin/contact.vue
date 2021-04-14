<template> 
        <div class="view">
           
            <div> 
                <input type="text" v-model="search" placeholder="search" class="border border-muted rounded-lg">
                
            <div class="mx-auto">
                <table class="table table-striped table-inverse table-hover table-responsive ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>RegNo</th>
                            <th>Message</th>
                            <th>Action</th> 
                        </tr>
                        </thead>
                        <tbody>
                           
                            <tr v-for="(item, index) in filterData" :key="index" data-toggle="modal" :data-target="`#id${ item.id}`" style="cursor:pointer"> 
                                <td>
                                  
                                   <span class="name font-weight-bold" style="color: rgb(36, 79, 107);">{{ item.name }}</span>
                                    
                                </td>
                                <td>
                                    <small class=" font-weight-bold text-muted">{{ item.email }}</small>
                                </td>
                                <td>
                                    <small class="font-italic">{{ item.message.slice(0,50) }}</small>
                                </td>
                                <td>
                                <button class="btn fa fa-eye text-white active " data-toggle="modal" :data-target="`#id${ item.id}`"></button>   
    
                                  <!-- Modal -->
                  <div class="modal fade" :id="`id${ item.id}`" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog " style="background: whitesmoke;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ item.name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body data"> 
                                <div class="form-group "> 
                                    <div class="col-12 p-0 pl-1">
                                    <label for="my-input">Message</label> 
                                    <textarea v-model="item.message" name="" id="" readonly cols="30" rows="10" class="form-control">
    
                                    </textarea> 
                                </div>  
                            </div> 
                        </div>
                    </div>
                </div>
                  </div>
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
            return { 
                search:'',
                dataCheck:false,
                data:[]
            }
        },
        mounted() {
            this.loadData();
        },
       computed: {
        filterData()
                {
                    return this.data.filter((item)=>{
                       return  (item.name.toLowerCase().match(this.search)) 
                       || 
                       
                       (item.email.toLowerCase().match(this.search)) 
                     
                    });
                }
       },
    methods: {
        loadData(){
              axios.get(`/admin`).then((res) => {
                this.data=res.data.contact
            }) 
        },
     
    },
}
</script>
<style lang="scss">
    .form-group {
        padding:1px;    
        margin:1px;
    }
    .avatar{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    /* .data>.form-group>.col-6>input{
        border: none !important;
    } */
    .border-muted{
        border: 1px solid rgb(76, 90, 125) !important;
        color:rgb(76, 90, 125) !important;
        padding: 2px;
    }
    .error{
        color:rgba(241, 32, 32, 0.747);
        font-size: 9px;
    }
</style>