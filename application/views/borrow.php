<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


<body>
    <main id="app" class="main center">

       <div class="container">
        <div class="header-content">
            <h3 class="font-bold">บันทึกการยืม</h3>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-primary" data-bs-toggle="modal" href="#staticBackdrop" role="button">เพิ่มอุปกรณ์</a>
        </div>

        <div class="row">
           <div class="col-md-6">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">ผู้รับอุปกรณ์</label>
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
                        <option value="3">ส่งซ่อม</option>
                        </select>
                    </div>
                </div>
           </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <button @click="submitdata" class="btn btn-primary">บันทึกข้อมูล</button>

        </div>
    
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>รหัสทรัพย์สิน</th>
                <th>ชื่ออุปกรณ์</th>
                <th>ประเภทอุปกรณ์ที่ยืม</th>
                <th>ยี่ห้ออุปกรณ์</th>
                <th>สถานะ</th>
                <th>ผู้รับอุปกรณ์</th>
                <th>#</th>
            </tr>
        </thead>
    </table>




</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="row">

            <div class="col-md-6">
            <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">รหัสทรัพย์สิน</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" v-model="refhwID">
                        </div>
                    </div>
            </div>

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
                        <label for="inputPassword" class="col-sm-4 col-form-label">ยี่ห้ออุปกรณ์</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" v-model="bandheadware">
                        </div>
                    </div>
            </div>
        
          <div class="col-md-6">
           <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">ประเภทอุปกรณ์ที่ยืม</label>
                    <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" v-model="selecthardwaretype">
                        <option selected>กรุณาเลือก</option>
                        <option value="อุปกรณ์คอมพิวเตอร์">อุปกรณ์คอมพิวเตอร์</option>
                        <option value="2">อื่นๆ</option>
                        </select>
                    </div>
                </div>
           </div>

           
           <div class="col-md-6" v-if="selecthardwaretype ==2 ">
            <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">โปรดระบุ</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control"  placeholder="โปรดระบุ" v-model="hardwaretype">
                        </div>
                    </div>
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" @click="inserthardware">บันทึกข้อมูล</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


<script>
 
  $(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "<?php echo base_url();?>ApiController/getequipment_datatable",
        dom: 'Bfrtip',
        buttons: [
    {
        extend: 'csv',
        text: 'Export csv',
        charset: 'utf-8',
        extension: '.csv',
        filename: 'export',
        bom: true
    }
],
        "columns": [
            { "data": "HwID" },
            { "data": "Namehardware" },
            { "data": "TypeHardware" },
            { "data": "brand" },
            { 
                "render":  ( data, type, row ) => {

                    let resultstatushd = ''
                    let classvchip=""
                    if(row.statushd == 1){
                        resultstatushd = 'ยืมอุปกรณ์'
                        classvchip = 'v-chip-custom orange'
                    }else if(row.statushd == 2){
                        resultstatushd = 'คืนอุปกรณ์'
                        classvchip = 'v-chip-custom green'
                    }else if(row.statushd == 3){
                        resultstatushd = 'ส่งซ่อม'
                        classvchip = 'v-chip-custom red'
                    }else{
                        resultstatushd = 'ไม่มีคนยืม'
                        classvchip = 'v-chip-custom btn-primary'
                    }
                    return `<p class="v-chip ${classvchip}">${resultstatushd}</p>`;

                    
                },
                
             },
             { 
                "render":  ( data, type, row ) => {

                    let resultname = ''
                    
                    if(row.FristName == null){
                        resultname ='ไม่มีผู้ยืม'
                    }else{
                        resultname = `${row.FristName} (${row.Position })`

                    }
                    return `<p>${resultname}</p>`;

                    
                },
                
             },
             {
                data: null,
                render: function ( data, type, row ) {

                    if(row.statushd ==  1 || row.statushd == 3){

                        return `<button class="btn btn-warning" onclick="vm.updatedatahardware('${row.HwID}')">รับคืนอุปกรณ์</button>`;

                    }else{

                        return ``;

                    }
                }
                }
        ]
    } );
} );


Vue.component('v-select', VueSelect.VueSelect);
var vm = new Vue({
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
    hardwaretype:'',
    HwID:'',
    bandheadware:'',
    refhwID:''

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
        
       },
       async callget_employee(){

        const { data } = await axios.get("<?php echo base_url();?>/ApiController/getequipment")

             this.equipment = data
         
       },
       async updatedatahardware(item){

        const { data } = await axios.post("<?php echo base_url();?>/ApiController/callupdate_hardwaretakeback",{
            HwID:item
                                    })

            if(data == 'OK'){

                Swal.fire('ข้อความแจ้งเตือน','Updateข้อมูลสำเร็จ','success')

                setTimeout(() => {
                    window.location.reload()
                }, 800);

            }
       },
       async submitdata(){

            let json = {
                IDEMployee:this.result.ID,
                band:this.band,
                statusselect:this.statusselect,
                HwID:this.equipmentshow.ID

            }

            if(this.result != ''){

                if(this.band != ''){

                    if(this.equipmentshow != ''){

                        if(this.statusselect != ''){

                            const { data } = await axios.post("<?php echo base_url();?>/ApiController/call_insert_hw_activitie",{
                                        ...json
                                    })

                                    if(data.statusvalue == 100){

                                        Swal.fire('ข้อความแจ้งเตือน','บันทึกข้อมูลสำเร็จ','success')

                                        setTimeout(() => {
                                            window.location.reload()
                                        }, 800);

                                    }else{
                                        Swal.fire('ข้อความแจ้งเตือน',data.Des,'warning')
                                    }

                        }else{
                           
                            Swal.fire('ข้อความแจ้งเตือน','กรุณาระบุสถานะ', 'error')
                        }
                    }else{
                     
                        Swal.fire('ข้อความแจ้งเตือน','กรุณาเลือกอุปกรณ์ที่ต้องการยืม','warning')

                    }
                }else{
                    Swal.fire('ข้อความแจ้งเตือน','กรุณาระบุชื่อผู้ยืม', 'error')

                }
            }else{
                Swal.fire('ข้อความแจ้งเตือน','กรุณาระบุชื่อผู้ยืม', 'error')
            }
           
       },
       async inserthardware(){


        let json = {
            HwID:this.refhwID,
            Namehardware:this.nameheadware,
            brand:this.bandheadware,
            Type:this.selecthardwaretype == 2 ? this.hardwaretype:this.selecthardwaretype,
        }

            if(this.refhwID != ''){
                    
                if(this.Namehardware != ''){

                    if(this.brand != ''){
                        
                        if(this.selecthardwaretype != ''){

                            if(this.selecthardwaretype == 2){
                                   
                                if(this.hardwaretype == ''){

                                    Swal.fire('ข้อความแจ้งเตือน','ประเภทอุปกรณ์ที่ยืม', 'error')
                                    return
                                }
                            }

                            const { data } = await axios.post('<?php echo base_url();?>/ApiController/inserthardware',{
                                  ...json
                                })

                                    if(data.statusvalue == 100){
                                        Swal.fire('ข้อความแจ้งเตือน','บันทึกข้อมูลสำเร็จ','success')

                                        setTimeout(() => {
                                            window.location.reload()
                                        }, 800);

                                    }else{

                                        Swal.fire('ข้อความแจ้งเตือน','รหัสทรัพย์สินซ้ำ', 'error')
                                    }


                        }else{
                            Swal.fire('ข้อความแจ้งเตือน','ประเภทอุปกรณ์ที่ยืม', 'error')

                        }
                    }else{

                        Swal.fire('ข้อความแจ้งเตือน','กรุณาระบุยี่ห้อ', 'error')
                    }
                }else{

                    Swal.fire('ข้อความแจ้งเตือน','กรุณาระบุชื่ออุปกรณ์', 'error')
                }

            }else{

                Swal.fire('ข้อความแจ้งเตือน','กรุณากรอกรหัสทรัพย์สิน', 'error')
            }




        // window.location.href="http://localhost/wiseowl_hw_thaweeporn-26-03-2022/index.php/ApiController/exports_data"
       }
   }

})
</script>

</html>