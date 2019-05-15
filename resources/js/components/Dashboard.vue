<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdminOrUser()">
        <!-- ./col -->
        <div v-if="$gate.isAdmin()" class="col-lg-3 col-6">
          <!-- small box -->
          <div  class="small-box bg-info">
            <div class="inner">
              <h3>{{getJumlahUser}}</h3>
              <p>Data Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <router-link to="/pengguna" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </router-link>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div v-if="$gate.isAdmin()" class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{getJumlahEmployee}}</h3>
              <p>Data Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-tie"></i>
            </div>
            <router-link to="/data-karyawan" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </router-link>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{getJumlahChildren}}</h3>
              <p>Data Anak</p>
            </div>
            <div class="icon">
              <i class="fas fa-child"></i>
            </div>
            <router-link to="/data-anak" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </router-link>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{getJumlahInventories}}</h3>
              <p>Data Inventaris</p>
            </div>
            <div class="icon">
              <i class="fas fa-warehouse"></i>
            </div>
            <router-link to="/inventaris" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </router-link>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row mt-1" v-if="$gate.isAdminOrKepala()">
        <div class="col-lg-6 col-col-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Grafik Anak Panti</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <Bar-Chart></Bar-Chart>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="col-lg-6 col-col-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Grafik Umur Anak</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <Pie-Chart></Pie-Chart>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.$store.dispatch("AllJumlah_Users");
    this.$store.dispatch("AllJumlah_Employees");
    this.$store.dispatch("AllJumlah_Childrens");
    this.$store.dispatch("AllJumlah_Inventories");
  },
  methods: {
    loadJumlah() {
      if (this.$gate.isAdmin()) {
        this.$store.dispatch("AllJumlah_Users");
        this.$store.dispatch("AllJumlah_Employees");
        this.$store.dispatch("AllJumlah_Childrens");
        this.$store.dispatch("AllJumlah_Inventories");
      }
    }
  },
  computed: {
    getJumlahUser() {
      return this.$store.getters.getJumlahUser;
    },
    getJumlahEmployee() {
      return this.$store.getters.getJumlahEmployee;
    },
    getJumlahChildren() {
      return this.$store.getters.getJumlahChildren;
    },
    getJumlahInventories() {
      return this.$store.getters.getJumlahInventories;
    }
  },
  created() {
    this.loadJumlah();
    Fire.$on("AfterCreated", () => {
      this.loadJumlah();
    });
  }
};
</script>
