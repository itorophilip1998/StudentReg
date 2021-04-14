<template>
    <div>
        <div class="post"> 
            
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
                                    <option value="1" >Semester One</option>
                                    <option  value="2">Semester Two</option> 
                                 </select> 
                            </div> 
                            <div class="form-group ">
                                <label for="my-input">Session</label>
                                <input id="my-input" v-model="session" class="form-control" placeholder="example(2020/2021)" type="text" name=""> 
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
                            <button type="button" @click="createPost()" class="btn active mt-1">Submit</button> 
                        </div> 
                    </div>
                </div>
            </div>
            <button class="btn active" data-toggle="modal" data-target="#modelId">Upload Result</button>
        </div>
        <div class="view">

        </div>
    </div>
</template>
<script>
export default {
    data() {
            return {
                files:[],
                department:'Computer Science',
                school:'Applied Science',
                program:'HND1',
                session:'2021/2022',
                credit_point:'28.98',
                credit_unit:'29', 
            }
        },
    methods: {
      
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

            let config = { headers: { 'Content-Type': 'multipart/form-data' } }  
            axios.post(`/result`, formData,config).then((res) => {
                this.allData()
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