<template>
    <div class="container pb-5 mb-5">
      <!-- input -->
      <div class="input text-center col-md-5 mx-auto p-3" v-if="!data && !loading">
            <input type="text" class="form-control my-3"  required  placeholder="Enter your Reg Number E.g(FPU/AS/COM/16/ND/001)">
           <select name="" class="form-control my-3"  required id="">
              <option value="">Select Program</option>
              <option >ND1</option>
              <option >ND2</option>
              <option >HND1</option>
              <option >HND2</option>
           </select> 
           <select name="" class="form-control my-3" required  id="">
              <option value="">Select Semester</option>
              <option value="1" >Semester One</option>
              <option  value="2">Semester Two</option> 
           </select> 
           <input type="text" class="form-control my-3" required  placeholder="2020/2021">
           <div class="text-left">
           <button  @click="checkResult()" class="btn rounded-lg text-white" style="background: #4c5a7d">Check <i class="fa fa-search" aria-hidden="true"></i></button>
         
           </div>
      </div>
      <div class="text-center py-5 mb-5" v-if="!data && loading">
        <div class="spinner-border" style="color: #4c5a7d" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>

      <div class="data py-5 p-3 my-5 bg-white shadow rounded-lg" v-if="data && !loading">
        
        <div class="slip text-center" id="printableArea">
          <h4><b>Result Slip</b></h4>
          <h6 class="p-0 m-0">Itoro Emmanuel Philip</h6>
          <p class="p-0 m-0">Computer science, Applied Science</p>
          <table class="table table-striped table-inverse table-responsive m-auto d-inline">
            <thead class="thead-inverse  bg-white">
              <tr>
                <th>Courses</th>
                <th>Grade</th>
                <th>Score(100%)</th>
                <th>Credit Unit</th>
              </tr>
              </thead>
              <tbody class=" bg-white">
                <tr>
                  <td>Com101</td>
                  <td>A</td>
                  <td>75</td>
                  <td>3</td>
                </tr>
                <tr>
                  <td>Com102</td>
                  <td>AB</td>
                  <td>68</td>
                  <td>1</td>
                </tr>
                <tr class="bg-white border-dark border" >
                  <td>GPA: </td>
                  <td><b>30.03</b></td> 
                  <td> CGPA: </td> 
                  <td> <b>3.0983</b></td> 
                </tr>
              </tbody>
          </table>
          <hr>
          <p class="p-0 m-0">Credit Point: <b>20</b></p>
          <p class="p-0 m-0">Total Credit Unit: <b>90.1</b></p>
          <p class="p-0 m-0">Remark: <b>Upper Credit</b></p>

        </div>
        <br>
      <button  @click="downloadResult()"   class="btn rounded-lg text-white" style="background: #4c5a7d">Print <i class="fa fa-download" aria-hidden="true"></i></button>  
      </div>

    </div>
</template>
<script>
export default {
    data() {
        return {
            data:false,
            loading:false,
            download:false,
            result:{
               semester:'',
               session:'',
               regNo:'',
               program:'' 
            }
        }
    },
    methods: {
       
      checkResult()
      { 
          this.loading=true,
        axios.post('/get-result',this.result).then((res)=>{
          this.loading=false, 
          this.data=true, 
          console.log(res) 
        }).catch((err)=>{
          this.loading=false, 
          this.data=false,  
          console.log(err)  

        }) 
       
      },
      downloadResult()
      {
        var printContents=document.getElementById('printableArea').innHtml;
        var originalContents=document.body.innHtml;
        document.body.innHtml=printContents;
        window.print()
         document.body.innHtml=originalContents; 
        this.data =! this.data
      }
    },
}
</script>
<style lang="scss">
    .spinner-border {
    display: inline-block;
    width: 8rem;
    height: 8rem;
    vertical-align: text-bottom; 
    border-radius: 50%;
    -webkit-animation:3s linear infinite spinner-border;
    animation: 3s linear infinite spinner-border;
    font-size: xx-large;
    border:10px dashed  #4c5a7d;  
}
</style>