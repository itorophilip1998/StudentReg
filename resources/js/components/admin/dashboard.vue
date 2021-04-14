<template>
    <div> 
        <div class="view">
            <div class="row">
               <div class="col-12 col-md-6 col-lg-4 p-2" v-for="(item, index) in keys" :key="index">
                <div :class="`card ${item.theme}`" @click="$router.push(item.url)" style="cursor: pointer;">
                    <div class="card-body">
                        <h5 class="card-title">
                          <i :class="`${item.icon}`" aria-hidden="true"></i>   
                        </h5>
                        <p class="card-text"> {{ item.head }}</p>
                    </div>
                    <div class="card-footer">   
                         {{  (item.url=="/user") ? data.user.length + " User(s)" : ''  }}
                         {{  (item.url=="/contact") ? data.contact.length + " Contact(s)" : ''  }}
                         {{  (item.url=="/news") ? data.dailynews.length + " News(s)" : ''  }}
                         {{  (item.url=="/result") ? data.result.length + " Result(s)" : ''  }} 
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
            return { 
               
                    data:[],
                    keys:[
                        {
                            url:'/user',
                            theme:'User',
                            head:'Users',
                            icon:'fa fa-user',  

                        },
                        {
                            url:'/contact',
                            theme:'Contact',
                            head:'Contact Us',
                            icon:'fa fa-phone', 


                        },
                        {
                            url:'/news', 
                            theme:'News',
                            head:'Daily News',
                            icon:'fa fa-newspaper-o', 


                        },
                        {
                            url:'/result', 
                            theme:'Result',
                            head:'Result',
                            icon:'fa fa-book', 

                        },
                    ]
            }
        },
        mounted() {
            this.loadData();
        },
        methods: { 
        loadData(){
              axios.get(`/admin`).then((res) => {
                this.data=res.data
            }) 
        },
    
}
}
</script>
<style lang="scss">
     .User{
         background:rgb(119, 96, 96) !important;
         color: white;
     }
     .Contact{
         background:rgb(101, 119, 96) !important;
         color: white;
     }
     .News{
         background:rgb(96, 103, 119) !important;
         color: white;
     }
     .Result{
         background:rgb(146, 109, 84) !important;
         color: white;
     } 
</style>