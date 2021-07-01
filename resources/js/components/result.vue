<template>
    <div class="container pb-5 mb-5">
      <!-- input -->
      <div class="input text-center col-md-5 mx-auto p-3" v-if="!data && !loading">
            <input type="text" class="form-control my-3" v-model="result.regNo"  required  placeholder="Enter your Reg Number E.g(FPU/AS/COM/16/ND/001)">
           <select name="" class="form-control my-3" v-model="result.program" required id="">
              <option value="">Select Program</option>
              <option >ND1</option>
              <option >ND2</option>
              <option >HND1</option>
              <option >HND2</option>
           </select>
           <select name="" v-model="result.semester" class="form-control my-3" required  id="">
              <option value="">Select Semester</option>
              <option value="1" >First Semester</option>
              <option  value="2">Second Semester</option>
           </select>
           <select name="" v-model="result.session" class="form-control my-3" required  id="">
              <option value="" selected>Select Session</option>
              <option v-for="(item, index) in years" :key="index">{{ item }}</option>
           </select>
           <div class="text-left">
           <button  @click="checkResult()" class="btn rounded-lg text-white" style="background: #4c5a7d">Check <i class="fa fa-search" aria-hidden="true"></i></button>

           </div>
      </div>
      <div class="text-center py-5 mb-5" v-if="!data && loading">
        <div class="spinner-border" style="color: #4c5a7d" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div class="text-center py-5 mb-5" v-if="!data && !loading && error">
        <h5   style="color:  #4c5a7d" role="status">
              No Record found <i class="fa fa-eye-slash" aria-hidden="true"></i>
        </h5>
      </div>

      <div class="data py-5 p-3 my-5 bg-white shadow rounded-lg" v-if="data && !loading">

        <div class="slip text-center" id="printableArea">
          <h4><b>Result Slip</b></h4>
          <h6 class="p-0 m-0">{{ resultShit.name}}</h6>
          <p class="p-0 m-0">{{ resultShit.department}}, {{ resultShit.school}}</p>
          <table class="table table-striped table-inverse w-75 m-auto ">
            <thead class="thead-inverse  bg-white">
              <tr>
                <th>Courses</th>
                <th>Grade</th>
                <th>Score(100%)</th>
              </tr>
              </thead>
             <tbody class=" bg-white text-uppercase">
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com101</td>
                  <td>{{ item.com101.slice(0,1) }}</td>
                  <td>{{ item.com101.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com111</td>
                  <td>{{ item.com111.slice(0,1) }}</td>
                  <td>{{ item.com111.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com112</td>
                  <td>{{ item.com112.slice(0,1) }}</td>
                  <td>{{ item.com112.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com113</td>
                  <td>{{ item.com113.slice(0,1) }}</td>
                  <td>{{ item.com113.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com114</td>
                  <td>{{ item.com114.slice(0,1) }}</td>
                  <td>{{ item.com114.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com115</td>
                  <td>{{ item.com115.slice(0,1) }}</td>
                  <td>{{ item.com115.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Com116</td>
                  <td>{{ item.com116.slice(0,1) }}</td>
                  <td>{{ item.com116.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>Gns101</td>
                  <td>{{ item.gns101.slice(0,1) }}</td>
                  <td>{{ item.gns101.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>OTM101</td>
                  <td>{{ item.otm101.slice(0,1) }}</td>
                  <td>{{ item.otm101.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>sta111</td>
                  <td>{{ item.sta111.slice(0,1) }}</td>
                  <td>{{ item.sta111.slice(2) }}</td>
                </tr>
                <tr v-for="(item, index) in resultShit.courses_grades" :key="index">
                  <td>sta112</td>
                  <td>{{ item.sta112.slice(0,1) }}</td>
                  <td>{{ item.sta112.slice(2) }}</td>
                </tr>

                <tr class="bg-white border-dark border text-center" >
                  <td>GPA:  <b> {{ resultShit.gpa}}</b></td>
                  <td></td>
                  <td> CGPA: <b> {{ resultShit.cgpa}}</b></td>
                </tr>
              </tbody>
          </table>
          <hr>
          <p class="p-0 m-0">Credit Point: <b>{{ resultShit.credit_point}}</b></p>
          <p class="p-0 m-0">Total Credit Unit: <b>{{ resultShit.credit_unit}}</b></p>
          <p class="p-0 m-0">Remark: <b>{{ resultShit.result}}</b></p>

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
            data:false,
            loading:false,
            error:false,
            download:false,
            result:{
               semester:'',
               session:'',
               regNo:'',
               program:''
            },
         resultShit:{}

        }
    },
    methods: {

      checkResult()
      {
          this.loading=true,
        axios.post('/get-result',this.result).then((res)=>{
          this.loading=false,
          this.data=true,
          this.resultShit=res.data,
          console.log(res)
        }).catch((err)=>{
          this.loading=false,
          this.data=false,
          this.error=true,
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
