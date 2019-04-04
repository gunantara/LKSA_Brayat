<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2" v-if="$gate.isAdmin()">
        <div class="col md-12">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header p-3">
              <h3 class="card-title">Pengaturan Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- Tab pick -->
            <div class="card">
              <div class="p-2">
                <ul class="nav nav-pills p-0">
                  <li class="nav-item">
                    <a class="nav-link active show" href="#about" data-toggle="tab">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#program" data-toggle="tab">Program</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#galeri" data-toggle="tab">Galeri</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Tab pick -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="tab-content">
                  <!-- About Tab -->
                  <div class="tab-pane active show" id="about"></div>
                  <!--  Program Tab -->
                  <div class="tab-pane" id="program"></div>
                  <!--  Galeri Tab -->
                  <div class="tab-pane" id="galeri"></div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <router-link to="/data-anak">
                  <button
                    type="submit"
                    class="btn btn-success float-right"
                    @click="SimpanProfile()"
                  >Simpan Profile</button>
                </router-link>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      description: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
