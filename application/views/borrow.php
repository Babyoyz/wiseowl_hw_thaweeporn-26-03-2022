<style>

</style>

<body>
    <main id="app" class="main center">

        <v-container data-app>

            <v-card>
                <v-card-title>
                        หน้าสำ หรับบันทึกข้อมูลการยืม คืน หรือส่งซ่อมอุปกรณ์
                    <v-spacer></v-spacer>
                    
                </v-card-title>
                <div>
                    

                </div>
            </v-card>
        </v-container>



    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue-json-to-csv"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="<?php echo base_url();?>assets/js/axios.min.js"></script>
<script src="<?php echo base_url();?>node_modules/vue-json-to-csv/dist/vue-json-to-csv.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
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
            resultexport:{
                CreateBy: "John",
                FristName: "Doe"
            },
            defaultSelected: [],
            headers: [{
                    text: 'Dessert (100g serving)',
                    align: 'start',
                    sortable: false,
                    value: 'name',
                },
                {
                    text: 'ผู้ยืม',
                    value: 'borrowerName'
                },
                {
                    text: 'Fat (g)',
                    value: 'borrowerName'
                },
                {
                    text: 'Carbs (g)',
                    value: 'Namehardware'
                },
                {
                    text: 'Protein (g)',
                    value: 'Position'
                },
                {
                    text: 'Iron (%)',
                    value: 'borrowerPosition'
                },
                {
                    text: 'typeactivities',
                    value: 'typeactivities',
                    align: 'center',
                },

            ],
            item: [],
            My_CSV: "testting"
        }
    },
    created() {
     
    },
    methods: {
        async calldata() {
            const {
                data
            } = await axios.get("<?php echo base_url();?>index.php/ApiController/", {})

            this.item = data
            // console.log(data)
            
            this.defaultSelected = this.item
            console.log(this.item)
            console.log(this.defaultSelected)
            this.defaultSelected.push({
                CreateBy:'All',
                FristName:'ทั้งหมด',
            })
        },
        getColor(typeactivities) {
            if (typeactivities == 1) return 'orange'
            else if (typeactivities == 2) return 'green'
            else return 'red'
        }
    },


})
</script>

</html>