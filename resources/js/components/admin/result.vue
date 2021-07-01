<template>
    <div>
        <div class="post">
           <div class="">
            <input type="text" v-model="search" placeholder="search" class="border border-muted rounded-lg">
            <button class="btn active float-md-right" data-toggle="modal" data-target="#modelId">Upload Result</button>

            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Result</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="my-input">Department</label>
                                <input id="my-input" v-model="department" class="form-control "    type="text" name="">
                            </div>
                            <div class="form-group ">
                                <label for="my-input">School</label>
                                <input id="my-input" v-model="school" class="form-control"    type="text" name="">
                            </div>

                            <div class="form-group ">
                                <label for="my-input">Program</label>
                                <select v-model="program" name="" class="form-control" required  id="">
                                <option value="">Select Program</option>
                                <option >ND1</option>
                                <option >ND2</option>
                                <option >HND1</option>
                                <option >HND2</option>
                             </select>
                            </div>
                            <div class="form-group ">
                                <label for="my-input">Semester</label>
                                <select v-model="semester" name="" class="form-control" required  id="">
                                    <option value="">Select Semester</option>
                                    <option value="1" >First Semester</option>
                                    <option  value="2">Second Semester</option>
                                 </select>
                            </div>
                            <div class="form-group ">
                                <label for="my-input">Session</label>
                                <select id="my-input" v-model="session" class="form-control" placeholder="example(2020/2021)" type="text" name="">
                                      <option value="" selected>Select Session</option>
                                    <option v-for="(item, index) in years" :key="index" >{{item}}</option>
                                 </select>
                            </div>
                            <div class="form-group row py-2">
                                <div class="col-6 p-0 pr-1">
                                <label for="my-input"> Credit Point  </label>
                                <input id="my-input" v-model="credit_point" class="form-control" placeholder="example(203.6)" type="text" name="">
                                </div>
                                <div class="col-6 p-0 pl-1">
                                <label for="my-input"> Credit Unit </label>
                                <input id="my-input" v-model="credit_unit" class="form-control" placeholder="example(25)" type="text" name="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Result File(xlsx and xls only)</label>
                                <input id="my-input" class="form-control-file border" multiple @change="inputMultiple()" type="file" name="">
                            </div>
                            <button  type="button" @click="createPost()" class="btn active mt-1">Submit</button>

                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>
        <div class="view">
              <div class="mx-auto">
                <table class="table table-striped table-inverse table-hover table-responsive ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>RegNo</th>
                            <th>GPA</th>
                            <th>CGPA</th>
                            <th>Grade</th>
                            <th>Department</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in filterData" :key="index"  style="cursor:pointer">
                                <td>

                                   <span class="name font-weight-bold" style="color: rgb(36, 79, 107);">{{ item.name }}</span>

                                </td>
                                <td>
                                    <small class=" font-weight-bold text-muted">{{ item.regNo }}</small>
                                </td>
                                <td>
                                    <small class="font-italic">{{ item.gpa }}</small>
                                </td>
                                <td>
                                    <small class="font-italic">{{ item.cgpa }}</small>
                                </td>
                                <td>
                                    <small class=" font-weight-bold text-muted">{{ item.result }}</small>
                                </td>
                                <td>
                                    <small class=" font-weight-bold text-muted">{{ item.department }}</small>
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
                done:false,
                years:[
                    "2020/2021",
                    "2019/2020",
                    "2018/2019",
                    "2017/2018",
                    "2016/2017",
                    "2015/2016",
                    "2014/2015",
                    "2013/2014",
                    "2012/2013",
                    "2011/2012",
                    "2010/2011",
                ],
                files:[],
                department:'Computer Science',
                school:'Applied Science',
                program:'HND1',
                session:'',
                credit_point:'28.98',
                semester:'',
                credit_unit:'29',
                search:"",
                data:[]
            }
        },
        mounted(){
            this.loadData()
        },
        computed: {
        filterData()
                {
                    return this.data.filter((item)=>{
                       return  (item.name.toUpperCase().match(this.search) || item.name.toLowerCase().match(this.search))
                       ||
                       (item.regNo.match(this.search.toUpperCase()))
                       ||
                       (item.cgpa.toLowerCase().match(this.search))
                        ||
                       (item.gpa.toLowerCase().match(this.search))
                       ||
                       (item.result.toLowerCase().match(this.search))
                        ||
                       (item.department.toLowerCase().match(this.search))
                      ;

                    });
                }
       },

    methods: {
      loadData(){
               axios.get(`/all-result`).then((res) => {
                this.data=res.data
            })
        },
        inputMultiple(){
                let input = event.target.files;
                for (let index = 0; index < input.length; index++) {
                    this.files.push(input[index])
                }
            },
            createPost(){
             const formData = new FormData();
            for (let index = 0; index < this.files.length; index++) {
                formData.append('files[]', this.files[index]);
            }
            formData.append('department', this.department);
            formData.append('school', this.school);
            formData.append('program', this.program);
            formData.append('session', this.session);
            formData.append('credit_point', this.credit_point);
            formData.append('credit_unit', this.credit_unit);
            formData.append('semester', this.semester);

            let config = { headers: { 'Content-Type': 'multipart/form-data' } }
            axios.post(`/result`, formData,config).then((res) => {
                location.reload()
            })
            // this.files=[]
        }
    },
}
</script>
<style lang="scss">
    .form-group {
        padding:1px;
        margin:1px;
    }
</style>
