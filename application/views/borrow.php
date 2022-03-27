<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">


<body>
    <main id="app" class="main center">

       <div class="container">
        <div class="header-content">
            <p>insert information</p>
        </div>

        <div class="row">
           <div class="col-md-6">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">ผู้ยืม</label>
                    <div class="col-sm-8">
                    <v-select :options="options" v-model="result" label="FristName"></v-select>
                    </div>
                </div>

           </div>
           <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">ฝ่าย</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" v-model="Positionshow" Readonly>
                    </div>
                </div>
           </div>
           <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">อุปกรณ์ที่ยืม</label>
                    <div class="col-sm-8">
                        <v-select :options="equipment" v-model="equipmentshow"  label="Namehardware"></v-select>
                    </div>
                </div>
           </div>
           <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">ยี่ห้อ</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" v-model="band" Readonly>
                    </div>
                </div>
           </div>

           <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">รหัสทรัพย์สิน</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" v-model="HwID" Readonly>
                    </div>
                </div>
           </div>

           <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">ประเภทอุปกรณ์ที่ยืม</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" v-model="equipmenttype" Readonly>
                    </div>
                </div>
           </div>
           <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">สถานะการยืม</label>
                    <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" v-model="statusselect">
                        <option selected>กรุณาเลือก</option>
                        <option value="1">ยืม</option>
                        <option value="2">คืน</option>
                        <option value="3">ส่งซ่อม</option>
                        </select>
                    </div>
                </div>
           </div>
        </div>
        <button @click="submitdata">submit</button>
    
        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1"  data-bs-backdrop="static" >
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
            <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">ชื่ออุปกรณ์</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" v-model="nameheadware">
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">สถานะการยืม</label>
                    <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" v-model="selecthardwaretype">
                        <option selected>กรุณาเลือก</option>
                        <option value="อุปกรณ์คอมพิวเตอร์">อุปกรณ์คอมพิวเตอร์</option>
                        <option value="2">อื่นๆ</option>
                        </select>
                    </div>
                </div>
           </div>
          </div>
  
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>


       </div>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="<?php echo base_url();?>assets/js/axios.min.js"></script>
<script src="https://unpkg.com/vue-select@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
Vue.component('v-select', VueSelect.VueSelect);
new Vue({
    el: '#app',
   data(){
       return{
        options: [
     
    ],
    result:'',
    Positionshow:'',
    statusselect:'',
    equipment:[],
    equipmenttype:'',
    equipmentshow:'',
    band:'',
    nameheadware:'',
    selecthardwaretype:'',
    HwID:''
    }
   },
   created() {
       this.calldata_employee()
       this.callget_employee()
   },
   updated() {

       this.Positionshow = this.result  != null ? this.result.Position :''

       this.equipmenttype = this.equipmentshow  != null ? this.equipmentshow.Type :''

       this.band = this.equipmentshow  != null ? this.equipmentshow.brand :''
       

       this.HwID = this.equipmentshow  != null ?  this.equipmentshow.HwID :''

    

   },
   methods:{
       async calldata_employee(){

            const { data } = await axios.get("<?php echo base_url();?>/ApiController/getmemberdata")

                this.options = data
             console.log(this.options)

       },
       async callget_employee(){

        const { data } = await axios.get("<?php echo base_url();?>/ApiController/getequipment")

             this.equipment = data
             
             console.log(this.equipment)

       },
       async submitdata(){

            let json = {
                IDEMployee:this.result.ID,
                band:this.band,
                statusselect:this.statusselect,
                HwID:this.equipmentshow.ID

            }

            const { data } = await axios.post("<?php echo base_url();?>/ApiController/call_insert_hw_activitie",{
                ...json
            })



            console.log(data)
       }
   }

})
</script>

</html>