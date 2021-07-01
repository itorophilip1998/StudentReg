<template>
    <div>
        <div class="post">

            <!-- Modal -->
            <div class="modal fade"  v-if="dataCheck" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Register New Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row pb-1">
                                <div class="col-6 p-0 pr-1">
                                <label for="my-input"> Name  </label>
                                <input id="my-input" v-model="register.name" class="form-control" placeholder="First Middle Last" type="text" name="">
                                <span class="error" v-if="error.name">{{ error.name[0] }}</span>
                                </div>
                                <div class="col-6 p-0 pl-1">
                                <label for="my-input"> Reg NO </label>
                                <input id="my-input" v-model="register.regNo" class="form-control" placeholder="FPU/AS/COM/16/ND/001" type="text" name="">
                                <span class="error" v-if="error.regNo">{{ error.regNo[0] }}</span>
                                </div>
                            </div>
                            <div class="form-group row pb-1">
                                <div class="col-6 p-0 pr-1">
                                <label for="my-input"> Email  </label>
                                <input id="my-input" v-model="register.email" class="form-control" placeholder="Email" type="email" name="">
                                <span class="error" v-if="error.email">{{ error.email[0] }}</span>
                                </div>
                                <div class="col-6 p-0 pl-1">
                                <label for="my-input"> School</label>
                                <input id="my-input" v-model="register.school" class="form-control" placeholder="School" type="text" name="">
                                <span class="error" v-if="error.school">{{ error.school[0] }}</span>

                                </div>
                            </div>
                            <div class="form-group row pb-1">
                                <div class="col-6 p-0 pr-1">
                                <label for="my-input"> Department  </label>
                                <input id="my-input" v-model="register.department" class="form-control" placeholder="Department" type="text" name="">
                                <span class="error" v-if="error.department">{{ error.department[0] }}</span>

                                </div>
                                <div class="col-6 p-0 pl-1">
                                <label for="my-input"> Country</label>
                                <input id="my-input" v-model="register.country" class="form-control" placeholder="" type="text" name="">
                                <span class="error" v-if="error.country">{{ error.country[0] }}</span>
                                </div>
                            </div>
                            <div class="form-group row pb-1">
                                <div class="col-6 p-0 pr-1">
                                <label for="my-input"> State  </label>
                                <input id="my-input" v-model="register.state" class="form-control" placeholder="" type="text" name="">
                                <span class="error" v-if="error.state">{{ error.state[0] }}</span>

                                </div>
                                <div class="col-6 p-0 pl-1">
                                <label for="my-input"> L.G.A</label>
                                <input id="my-input" v-model="register.lga" class="form-control" placeholder="Local Government Area" type="text" name="">
                                <span class="error" v-if="error.lga">{{ error.lga[0] }}</span>

                                </div>
                            </div>
                            <div class="form-group row pb-1">
                                <div class="col-6 p-0 pr-1">
                                <label for="my-input"> Address  </label>
                                <input id="my-input" v-model="register.address" class="form-control" placeholder="Home town" type="text" name="">
                                <span class="error" v-if="error.address">{{ error.address[0] }}</span>

                                </div>
                                <div class="col-6 p-0 pl-1">
                                <label for="my-input">Student Status</label>
                                <select id="my-input" required v-model="register.status" class="form-control" placeholder="Addtional Information " type="text" name="">
                                    <option value="" selected>Select Status</option>
                                    <option>Divorce</option>
                                    <option>Married</option>
                                    <option>Single</option>
                                </select>
                                <span class="error" v-if="error.status">{{ error.status[0] }}</span>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Profile Picture (image only)</label>
                                <input id="my-input" required accept="image/*" class="form-control-file border"  @change="inputMultiple()" type="file" name="">
                                <span class="error" v-if="error.picture">{{ error.picture[0] }}</span>

                            </div>
                            <button type="button" @click="createPost()" class="btn active mt-1">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="view">
            <div class="alert alert-primary alert-dismissible fade show" v-if="success" role="alert">
                <button type="button" class="close" @click="success=''" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Mesage:</strong> {{ success }}
            </div>
            <div>
                <input type="text" v-model="search" placeholder="search" class="border border-muted rounded-lg">
                <button @click="dataCheck=true" class="btn active float-right" data-toggle="modal" data-target="#modelId">Add Student +</button>
                </div>
                <br>
            <div class="mx-auto">
                <table class="table table-striped table-inverse table-hover table-responsive ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>RegNo</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(item, index) in filterData" :key="index"  style="cursor:pointer">
                                <td>

                                   <span class="name font-weight-bold" style="color: rgb(36, 79, 107);">{{ item.name }}</span>

                                </td>
                                <td>
                                    <small class=" font-weight-bold text-muted">{{ item.RegNo }}</small>
                                </td>
                                <td>
                                    <small class="font-italic">{{ item.email }}</small>
                                </td>
                                <td>
                                <button class="btn fa fa-eye text-white active " data-toggle="modal" :data-target="`#id${ item.id}`"></button>
                                <button class="btn fa fa-trash text-white bg-danger " @click="deletData(item.id)"></button>

                                  <!-- Modal -->
                  <div class="modal fade" :id="`id${ item.id}`" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog " style="background: whitesmoke;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ item.name }} </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body data">
                                <div class="form-group  pb-1 text-center">
                                  <a :href="item.profile.pcture" target="item.profile.pcture">
                                    <img class="avatar " :src="item.profile.picture" alt="">
                                   </a>
                                </div>
                                <div class="form-group row pb-1">
                                    <div class="col-6 p-0 pl-1">
                                    <label for="my-input"> School</label>
                                    <input id="my-input" v-model="item.profile.school" readonly class="form-control" placeholder="School" type="text" name="">

                                    </div>
                                    <div class="col-6 p-0 pr-1">
                                        <label for="my-input"> Department  </label>
                                        <input id="my-input" v-model="item.profile.department"      readonly class="form-control" placeholder="Department" type="text" name="">
                                        </div>
                                </div>
                                <div class="form-group row pb-1">

                                    <div class="col-6 p-0 pl-1">
                                    <label for="my-input"> Country</label>
                                    <input id="my-input" v-model="item.profile.country" readonly class="form-control" placeholder="" type="text" name="">

                                    </div>
                                    <div class="col-6 p-0 pr-1">
                                        <label for="my-input"> State  </label>
                                        <input id="my-input" v-model="item.profile.state" readonly class="form-control" placeholder="" type="text" name="">
                                        </div>
                                </div>
                                <div class="form-group row pb-1">

                                    <div class="col-6 p-0 pl-1">
                                    <label for="my-input"> L.G.A</label>
                                    <input id="my-input" v-model="item.profile.lga" readonly class="form-control" placeholder="Local Government Area" type="text" name="">

                                    </div>
                                    <div class="col-6 p-0 pr-1">
                                        <label for="my-input"> Address  </label>
                                        <input id="my-input" v-model="item.profile.address" readonly class="form-control" placeholder="Home town" type="text" name="">
                                        </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-12 p-0 pl-1">
                                    <label for="my-input">Student Status</label>
                                    <textarea v-model="item.profile.status" name="" id="" readonly cols="30" rows="1" class="form-control text-center">

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
                 register:{
                    name:"Itoro Emmanuel Philip",
                    email:"itorophilip1998@gmail.com",
                    regNo:"FPU/AS/COM/16/ND/001",
                    department:"Computer Secince",
                    picture:"",
                    school:"Applied Scince",
                    country:"Nigeria",
                    state:"Akwa Ibom",
                    lga:"Uyo",
                    address:"Mbiakpaken ikot edim",
                    status:"Single oooo",
                    },
                    data:[],
                    error:[],
                    success:"",
                    editedData:{}
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
                       (item.RegNo.match(this.search.toUpperCase()))
                       ||
                       (item.email.toLowerCase().match(this.search))
                        ||
                       (item.profile.department.toLowerCase().match(this.search))
                       ||
                       (item.profile.school.toLowerCase().match(this.search))
                        ||
                       (item.profile.country.toLowerCase().match(this.search))
                       ||
                       (item.profile.state.toLowerCase().match(this.search))
                       ||
                       (item.profile.lga.toLowerCase().match(this.search))
                       ||
                       (item.profile.address.toLowerCase().match(this.search));

                    });
                }
       },
    methods: {

        deletData(id)
        {
            axios.delete(`/delete-user/${id}`).then((res) => {
                this.loadData()
                this.success="User deleted successfully"

            })
        },
        loadData(){
              axios.get(`/admin`).then((res) => {
                this.data=res.data.user
            })
        },
        inputMultiple(){
                let input = event.target.files;
                this.register.picture=input[0]
            },
            createPost(){
             const formData = new FormData();
             formData.append('name', this.register.name);
             formData.append('email', this.register.email);
             formData.append('regNo', this.register.regNo);
             formData.append('department', this.register.department);
             formData.append('picture', this.register.picture);
             formData.append('school', this.register.school);
             formData.append('country', this.register.country);
             formData.append('state', this.register.state);
             formData.append('lga', this.register.lga);
             formData.append('address', this.register.address);
             formData.append('status', this.register.status);
            let config = { headers: { 'Content-Type': 'multipart/form-data' } }
           axios.post(`/create-user`, formData, config).then((res) => {
                this.loadData()
                this.success="User created successfully"
                this.dataCheck=false
               document.getElementsByClassName('modal-backdrop')[0].className=""
               document.getElementsByClassName('modal-open')[0].style=""
               document.getElementsByClassName('modal-open')[0].className=""

            }).catch((error)=>{
                if (error.response.status==422) {
                    this.error=error.response.data.errors
                }
            })
        }
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
