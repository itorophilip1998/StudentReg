<template>
    <div class="container">
         <div class="row"> 
             <!-- content -->
             <div class="col-md-7 p-0"> 
                 <div class="div py-2 d-md-none">
                     <button data-toggle="modal" data-target="#profile" class="btn text-secondary bg-white shadow"><i class="fa fa-user" aria-hidden="true"></i></button>
                     <a href="/home" class="btn text-secondary bg-white shadow"><i class="fa fa-home" aria-hidden="true"></i></a> 
                     <button data-toggle="modal" data-target="#createM" class="btn text-secondary bg-white shadow"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button> 
 
                     
                     <!-- Mobile profile -->
                     <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Profile</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                 </div>
                                 <div class="modal-body">
                                        <!-- profile -->
                                    <div class="profile container py-2" style="background: whitesmoke;" >
                                        <div class="img text-center ">
                                        <a :href="user.profile.picture">
                                            <img class="rounded-circle shadow" style="width: 150px;height: 150px;" :src="user.profile.picture" 
                                        alt="">
                                        </a>
                                        <h4 class="name mt-1">{{ user.name }}</h4>
                                        <h5 class="email text-muted">{{ user.email }}</h5>
                                        <p class="status border p-3 rounded-lg text-left bg-white">{{ user.profile.status }}</p>
                                        <p class="from border p-3 rounded-lg text-left  bg-white"><i class="fa fa-map-marker" aria-hidden="true"></i> 
                                            {{ user.profile.address }}, {{ user.profile.lga }}, {{ user.profile.state }}, {{ user.profile.country }}
                                        </p>
                                        <p class="studies border p-3 rounded-lg text-left  bg-white"><i class="fa fa-book" aria-hidden="true"></i>
                                            {{ user.profile.department }}, {{ user.profile.school }}
                                        </p>
                                        </div>
                        
                                    </div>
                                 </div> 
                             </div>
                         </div>
                     </div>
                     <!-- create post for mobile -->  
                     <div class="modal fade" id="createM" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Create News</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="post container">
                                        <h3>What is <span class="text-warning">new</span>?</h3> 
                                     <div class="form-group"> 
                                         <input id="my-input"   accept="image/*" multiple @change="inputMultiple()" class="form-control-file border bg-white" type="file" name="">
                                         <small class="text-secondary">Upload files(photos only) max of 3 </small> 
                                        </div>
                                     <textarea name="" v-model="news.message" class="form-control" placeholder="Write here..." id="" cols="30" rows="10"></textarea>  
                                     <button v-if="updateData=='create'"  @click="createPost()" style="background:#4C5A7D" class="btn border text-white mt-2">Post <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                     <button v-if="updateData=='update'" @click="setUpdate()" style="background:#4C5A7D" class="btn border text-white mt-2">Update <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                     <button v-if="updateData=='update'" @click="cancelUpdate()" style="background:rgb(155, 157, 161)" class="btn border text-white mt-2">Cancel <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                     <hr>
                                    </div>
                                 </div>
                                 
                             </div>
                         </div>
                     </div>

                 </div>
                    <div class="card" v-for="(item, index) in dailynews" :key="index" >
                        <!-- post title start -->
                        <div class="post-title d-flex align-items-center">
                            <!-- profile picture end -->
                            <div class="profile-thumb"> 
                                <a :href="item.user.profile.picture">
                                    <figure class="shadow" > 
                                        <img class="shadow rounded-circle" width="60px" height="60px" :src="item.user.profile.picture" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end --> 

                            <div class="posted-author">
                                <h6 class="author pb-0"><a :href="item.user.email">{{ item.user.name }}</a></h6>
                                <span class="post-time pt-1">{{ timer(item.created_at)}}</span>
                            </div> 
                            <div class="post-settings-bar">
                                <button @click="updatePost(item)"  v-if="user.id==item.user_id" class="btn text-seccess d-none d-md-inline bg-white float-right"><i class="fa fa-pencil" aria-hidden="true"></i></button>  
                                <button @click="updatePost(item)" data-toggle="modal" data-target="#createM"  v-if="user.id==item.user_id" class="btn text-seccess d-inline d-md-none bg-white float-right"><i class="fa fa-pencil" aria-hidden="true"></i></button>  
                            </div>
                             
                            
                        </div>
                        <!-- post title start -->
                        <div class="post-content">
                            <p class="post-desc">
                        <truncate clamp="Read more>>" :length="200" action-class="customClass btn btn-sm" collapsed-text-class="collapsed" type="text" less="..."
                             :text="item.message"></truncate>

                               
                            </p>
                            <div class="post-thumb-gallery" v-if="item.picture">  
                            <!-- one image --> 
                                <figure class="post-thumb img-popup" v-if="item.picture.length==1">      
                                    <div  class="p-0">
                                        <div v-for="img in item.picture"  class="p-0">
                                        <a :href="`${img}`" ><img class="rounded-lg postImg  " :src="`${img}`"  alt=""></a>
                                        </div >
                                    </div > 
                              </figure>
                                  <!--two images --> 
                                <figure class="post-thumb img-popup" v-if="item.picture.length ==2">      
                                <div  class="row  m-0 p-0">
                                    <div v-for="(img,id) in  item.picture"  class="col-6 " style="padding:1px" :key="id">
                                    <a :href="`${img}`"><img class="postImg border rounded-lg "  :src="`${img}`"  alt=""></a>
                                    </div>
                                </div>
                              </figure>
                                  <!--three images -->
                                <figure class="post-thumb img-popup" v-if="item.picture.length == 3">     
                                <div    class="row  m-0 p-0  " >
                                    <div  class="col-4 " style="padding:1px">
                                    <div class="row " >
                                        <div class="col-12">
                                            <a :href="`${item.picture[0]}`" ><img class="rounded-lg border postImg "  :src="`${item.picture[0]}`"  alt=""></a>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <a :href="`${item.picture[1]}`" ><img class="rounded-lg border postImg "  :src="`${item.picture[1]}`"  alt=""></a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-8 m-auto">
                                    <a :href="`${item.picture[2]}`" ><img class="rounded-lg border postImg  "  :src="`${item.picture[2]}`"  alt=""></a>
                                    </div>
                                </div>

                              </figure>
                                
                            </div>

              


                           <div class="div">
                               
                               <!-- Modal -->
                               <div class="modal fade" :id="`like${item.id}`" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title">People who like this post <i class="fa fa-thumbs-up text-primary" aria-hidden="true"></i></h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                           </div>
                                           <div class="modal-body">
                                               <ul class="list-group">
                                                   <li class="list-group-item " v-for="(likes, index) in item.likes" :key="likes.id">
                                                       <img style="width: 35px;height: 35px;" :src="likes.user.profile.picture" alt="">
                                                       <span class="name font-weight-bold">{{ likes.user.name}}</span>
                                                       <small class="float-right font-italic">{{ timer(likes.created_at)}}</small>
                                                    </li>  
                                               </ul>
                                           </div> 
                                       </div>
                                   </div>
                               </div>
                            <small class="text-primary"  style="cursor: pointer;"  v-if="item.likes.length > 0" data-toggle="modal" :data-target="`#like${item.id}`">
                                <span v-if="item.islike && item.likes.length ==1">You Like this post</span> 
                                <span v-if="item.islike && item.likes.length ==2">You and {{ item.likes.length- 1}} person like this post</span> 
                                <span v-if="item.islike && item.likes.length > 2">You and {{ item.likes.length- 1}} people like this post</span> 
                                <span v-if="item.likes.length >= 2">{{ item.likes.length}} people like this post</span>  
                                <span v-if="item.islike==false && item.likes.length ==1">{{ item.likes.length}} person like this post</span>  
                            </small> 
                            <small class="text-secondary float-right" v-if="item.comments.length==1">{{ item.comments.length }} Comment</small> 
                            <small class="text-secondary float-right" v-if="item.comments.length > 1">{{ item.comments.length }} Comments</small> 
                           </div>
                            <hr class="mt-1">
                            <div class="links">
                                <button data-toggle="modal" :data-target="'#coment'+item.id" class="btn text-secondary"><i class="fa fa-comments" aria-hidden="true"></i></button>
                                <button class="btn text-primary" v-if="!item.islike" @click="createLike(item.id)"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button> 
                                <button class="btn text-primary" v-if="item.islike" @click="createLike(item.id)"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button> 
                                <button class="btn text-danger"  @click="deletePost(item.id)"><i class="fa fa-trash" aria-hidden="true"></i></button> 
 
                <!-- Modal -->
                <div class="modal fade" :id="'coment'+item.id" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Comments</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body" style="background-color: rgb(241, 241, 241);">
                            <div class="loadComment bg-white shadow border rounded-lg p-2 my-2" v-for="(comment, index) in item.comments" :key="index">

                                <!-- comment profile --> 
                                    <a href="comment.user.email"> 
                                            <img class="shadow border-0 rounded-circle"  style="width: 40px;height:40px" :src="comment.user.profile.picture" alt="profile picture">
                                            <span class="Cauthor pb-0" style="font-weight: bold;">{{ comment.user.name }}</span>   
                                            
                                    </a> 
                                    <div class="comment">
                                        <truncate clamp="Read more>>" :length="200" action-class="customClass   btn btn-sm" collapsed-text-class="collapsed" type="text" less="..." :text="comment.comment"></truncate>

                                    </div> 
                            </div>
                <hr>
                                <div class="form-group ">
                                    <label for="my-textarea">Comments</label> 
                                    <textarea id="my-textarea" v-model="comment.comment" class="form-control" name="" rows="3"></textarea>   
                                    <button type="button" @click="createComment(item.id)" class="btn btn-sm btn-primary mt-1">Post <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div> 
                </div>
                        </div> 
                 </div> 

             </div>

            <!-- search/post -->
             <div class=" col-md-5 d-none d-md-block">
               <div class="post container">
                   <h3>What is <span class="text-warning">new</span>?</h3> 
                <div class="form-group"> 
                    <input id="my-input"   accept="image/*" multiple @change="inputMultiple()" class="form-control-file border bg-white" type="file" name="">
                <small class="text-secondary">Upload files(photos only) max of 3 </small> 
                                <span class="error" v-if="error.picture">{{ error.picture[0] }}</span>   

                </div>
                <textarea name="" v-model="news.message" class="form-control" placeholder="Write here..." id="" cols="30" rows="10"></textarea>  
                                <span class="error" v-if="error.message">{{ error.message[0] }}</span>   

                <button v-if="updateData=='create'"  @click="createPost()" style="background:#4C5A7D" class="btn border text-white mt-2">Post <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                <button v-if="updateData=='update'" @click="setUpdate()" style="background:#4C5A7D" class="btn border text-white mt-2">Update <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                <button v-if="updateData=='update'" @click="cancelUpdate()" style="background:rgb(155, 157, 161)" class="btn border text-white mt-2">Cancel <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                <hr>
               </div>

               <!-- profile -->
               <div class="profile container">
               <div class="img text-center ">
                <a :href="user.profile.picture">
                    <img class="rounded-circle shadow" style="width: 150px;height: 150px;" :src="user.profile.picture" 
                alt="">
                </a>
                <h4 class="name mt-1">{{ user.name }}</h4>
                <h5 class="email text-muted">{{ user.email }}</h5>
                <p class="status border p-3 rounded-lg text-left bg-white">{{ user.profile.status }}</p>
                <p class="from border p-3 rounded-lg text-left  bg-white"><i class="fa fa-map-marker" aria-hidden="true"></i> 
                    {{ user.profile.address }}, {{ user.profile.lga }}, {{ user.profile.state }}, {{ user.profile.country }}
                </p>
                <p class="studies border p-3 rounded-lg text-left  bg-white"><i class="fa fa-book" aria-hidden="true"></i>
                    {{ user.profile.department }}, {{ user.profile.school }}
                </p>
               </div>

             </div>

             </div>
               
         </div>
    </div>
</template>

<script>
    import truncate from 'vue-truncate-collapsed';
    import moment from 'moment';
    export default {
        components: {
          truncate   ,
          moment,
           },
           props:['user'],
           data() {
               return {
                   comment:{
                       user_id:this.user.id,
                       comment:'',
                       daily_news_id:'',
                   },
                   likes:{
                       user_id:this.user.id, 
                       daily_news_id:'',
                   },
                   news:{
                       user_id:'',
                       message:'',
                       picture:[],
                       id:''
                   }, 
                   dailynews:[],
                   updateData:'create', 
                   error:[]
               }
           },
       mounted() {  
           this.allData();
       },
       methods: {
        deletePost(id)
        {
            axios.delete(`/dailyNews/${id}`).then((res) => {
                this.allData()
            })
        },
           allData(){
            axios.get(`/dailyNews`).then((res) => {
                    this.dailynews=res.data 
            }) 
           },
        inputMultiple(){
                let input = event.target.files;  
                for (let index = 0; index < input.length; index++) {
                     this.news.picture.push(input[index])  
                }   
            },
        timer(time) {
            return moment(time).fromNow();
        },
        createPost(){ 
        const formData = new FormData();
          if (this.news.picture.length <= 3) {
            for (let index = 0; index < this.news.picture.length; index++) { 
                formData.append('picture[]', this.news.picture[index]);
            } 
          }
          
             
            formData.append('user_id', this.user.id);
            formData.append('message', this.news.message);
            let config = { headers: { 'Content-Type': 'multipart/form-data' } }  
            axios.post(`/dailyNews`, formData,config).then((res) => {
                this.allData()
            }).catch((error)=>{ 
                if (error.response.status==422) {
                    this.error=error.response.data.errors  
                }
            })
            this.news = {
                       user_id:'',
                       message:'',
                       picture:[],
                       id:''
                   }
        }, 
           createComment(daily_news_id){
            this.comment.daily_news_id=daily_news_id
              axios.post(`/comments`, this.comment).then((res) => {
                this.allData()
               }).catch((error)=>{ 
                if (error.response.status==422) {
                    this.error=error.response.data.errors  
                }
            })
           }, 
           updatePost(data){  
            this.updateData='update'
                     this.news={
                        user_id:data.user_id,
                        message:data.message,
                        picture:data.picture,
                        id:data.id,
                     }   
           },
           createLike(daily_news_id){ 
            this.likes.daily_news_id=daily_news_id
              axios.post(`/likes`, this.likes).then((res) => {
                this.allData()
               }).catch((error)=>{ 
                if (error.response.status==422) {
                    this.error=error.response.data.errors  
                }
            })
           }, 
           cancelUpdate(data){
            this.updateData='create'

            this.news = {
                       user_id:'',
                       message:'',
                       picture:[],
                       id:''
                   }
           },
           setUpdate(){  
            const formData = new FormData();
          if (this.news.picture.length <= 3 ) {
            for (let index = 0; index < this.news.picture.length; index++) { 
                formData.append('picture[]', this.news.picture[index]);
            } 
          } 
            formData.append('user_id', this.user.id);
            formData.append('message', this.news.message);
            formData.append('_method', 'PUT');
            let config = { headers: { 'Content-Type': 'multipart/form-data' } }  
            axios.post(`/dailyNews/${this.news.id}`, formData,config).then((res) => {
                this.allData()
            }).catch((error)=>{ 
                if (error.response.status==422) {
                    this.error=error.response.data.errors  
                }
            })
            this.news = {
                       user_id:'',
                       message:'',
                       picture:[],
                       id:''
                   }
            this.updateData='create'

           },
          
       },
    }
</script>

<style lang="scss">
figure{
    background:whitesmoke;
    border: 1px solid lightgray;
    border-radius: 4px;
}
   .error{
        color:rgba(241, 32, 32, 0.747);
        font-size: 9px;
    }
    .card {
    border: none;
    border-radius: 0;
    padding: 30px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 1px 15px 0px rgb(51 51 51 / 20%);
    box-shadow: 0px 1px 15px 0px rgb(51 51 51 / 20%);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
 
.profile-thumb-middle {
    width: 60px;
    height: 60px;
    display: block;
    border-radius: 50%;
    overflow: hidden;
    border: 1px solid lightgray;
}
.posted-author {
    margin-left: 20px;
}
.author {
    font-size: 14px;
    font-weight: 800;
    line-height: 1;
    text-transform: capitalize;
}
.posted-author .post-time {
    display: block;
    font-size: 14px;
    line-height: 1;
    padding-top: 10px;
}
.author a {
    color: #333333;
}
figure {
    margin: 0;
}
mg {
    max-width: 100%;
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
}
.post-thumb img {
    width: 100%;
}
.rounded-lg{
    border-radius: 10px;
}
.post-settings-bar {
    margin-left: auto;
    position: relative;
    cursor: pointer;
}
</style>
