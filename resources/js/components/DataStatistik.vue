<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2" v-if="$gate.isAdminOrKepala()">
        <div class="col md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header p-3">
              <h3 class="card-title">Data Statistik</h3>
            </div>
            <!-- /.card-header -->
            <!-- Tab pick -->
            <div class="card">
              <div class="p-2">
                <ul class="nav nav-pills p-0">
                  <li class="nav-item" v-for="tab in tabs" :key="tab[0]">
                    <a
                      :href="`#${tab.name}`"
                      @click.prevent="setActiveTabName(tab.name)"
                      class="nav-link show"
                      data-toggle="tab"
                    >{{ tab.displayName }}</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Tab pick -->
            <!-- form start -->

            <div class="card-body">
              <div class="tab-content">
                <div
                  v-if="displayContents(activeTabName, 'anak_pertahun')"
                  :class="`active tab-pane show`"
                  :id="`anak_pertahun`"
                >
                  <Bar-Chart></Bar-Chart>
                </div>
                <div
                  v-if="displayContents(activeTabName, 'umur_anak')"
                  :class="`active tab-pane show`"
                  :id="`umur_anak`"
                >
                  <Pie-Chart></Pie-Chart>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
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
      // List here all available tabs
      tabs: [
        {
          name: "anak_pertahun",
          displayName: "Grafik Anak (PerTahun)"
        },
        {
          name: "umur_anak",
          displayName: "Grafik Umur Anak"
        }
      ],
      activeTabName: null
    };
  },
  mounted() {
    // The currently active tab, init as the 1st item in the tabs array
    this.activeTabName = this.tabs[0].name;
  },
  methods: {
    setActiveTabName(name) {
      this.activeTabName = name;
    },
    displayContents(name) {
      return this.activeTabName === name;
    }
  }
};
</script>
