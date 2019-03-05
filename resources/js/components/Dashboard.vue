<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdmin()">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>7</h3>
              <p>Data Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <router-link to="/users" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </router-link>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>5</h3>
              <p>Data Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <router-link to="/users" class="small-box-footer">
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
              <h3>10</h3>

              <p>Data Anak</p>
            </div>
            <div class="icon">
              <i class="fas fa-scroll"></i>
            </div>
            <router-link to="/topic" class="small-box-footer">
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
              <h3>9</h3>
              <p>Data Inventaris</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-bar"></i>
            </div>
            <router-link to="/option" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </router-link>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
    <div v-if="!$gate.isAdmin()">
      <not-found></not-found>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
