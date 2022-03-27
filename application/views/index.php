<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">


<body>
    <main id="app" class="main center">

        <v-container data-app>
    
            <v-card>
                <v-card-title>
                    หน้าแสดงรายการข้อมูลการยืม คืน หรือส่งซ่อมอุปกรณ์ทั้งหมด
                    <v-spacer></v-spacer>
                    <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details>
                    </v-text-field>
                </v-card-title>
                <v-data-table :headers="headers" :items="item" :search="search" loading
                    loading-text="กำลังโหลดข้อมูล">
                    <template v-slot:item.status="{ item }">
                        <v-chip :color="getColor(item.status)" dark v-if="item.status == 1"
                            class="d-flex justify-center">
                            ยืมอุปกรณ์
                        </v-chip>
                        <v-chip :color="getColor(item.status)" dark class="d-flex justify-center"
                            v-else-if="item.status == 2">
                            คืนอุปกรณ์
                        </v-chip>

                        <v-chip :color="getColor(item.status)" dark class="d-flex justify-center" v-else>
                            ส่งซ่อม
                        </v-chip>

                    </template>
                </v-data-table>
            </v-card>
            <h2 class="header-font">รายงานภาพรวมการยืมอุปกรณ์</h2>
            <div class="main-chart">
            <div class="div-cart">
                <canvas id="myChart"></canvas>
            </div>
            </div>
        </v-container>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue-json-to-csv"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="<?php echo base_url();?>assets/js/axios.min.js"></script>
<script src="<?php echo base_url();?>node_modules/vue-json-to-csv/dist/vue-json-to-csv.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
Vue.use(VueJsonToCsv);
</script>
<script>

new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data() {
        return {
            search: '',
            dialog: false,
            defaultSelected: [],
            headers: [     {
                    text: 'ชื่อผู้ยืม',
                    value: 'FristName'
                },
                {
                    text: 'ตำแหน่งผู้ยืม',
                    value: 'Position'
                },
                {
                    text: 'อุปรกรณ์ที่ยืม',
                    value: 'Namehardware',
                    align: 'center'
                },
                {
                    text: 'ประเภทอุปกรณ์ที่ยืม',
                    value: 'Typehardware',
                    align: 'center'
                },
                {
                    text: 'สถานะ',
                    value: 'status',
                    align: 'center',
                },
                {
                    text: 'CreatedDate',
                    value: 'hwc_CreateDate',
                    align: 'center'
                },
            ],
            item: [],
            My_CSV: "testting"
        }
    },
    created() {
        this.calldata()
    },
    methods: {
        async calldata() {
            const {
                data
            } = await axios.get("<?php echo base_url();?>/ApiController/", {})

            this.item = data    
       
   
        },
        getColor(typeactivities) {
            if (typeactivities == 1) return 'orange'
            else if (typeactivities == 2) return 'green'
            else return 'red'
        }
    },


})
</script>

<script>

const plugin = {
  id: 'custom_canvas_background_color',
  beforeDraw: (chart) => {
    const ctx = chart.canvas.getContext('2d');
    ctx.save();
    ctx.globalCompositeOperation = 'destination-over';
    ctx.fillStyle = 'lightGreen';
    ctx.fillRect(0, 0, chart.width, chart.height);
    ctx.restore();
  }
};

    
axios.get("<?php echo base_url();?>/ApiController/call_getdatacart",{})

.then(( {data} ) => {

    console.log(data)
    let arraydata = []
    for(let i of data){
        arraydata.push(i.countdata)
    }
    const datacart = {
     labels: [
    'ยืมอุปกรณ์',
    'คืนอุปกรณ์',
    'ส่งซ่อม'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: arraydata,
    backgroundColor: [
      'orange',
      'green',
      'red'
    ],
    hoverOffset: 4
  }]
};
  const config = {
  type: 'doughnut',
  data: datacart,
  plugins: [plugin],
};
const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

})

.catch((err) => {
    console.error(err)
})
 
</script>

<script>
 
</script>
</html>