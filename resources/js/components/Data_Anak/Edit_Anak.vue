<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2" v-if="$gate.isAdminOrUser()">
        <div class="col md-12">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header p-3">
              <h3 class="card-title">Ubah Data Anak -> {{this.form.Nama_Lengkap}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- Tab pick -->
            <div class="card">
              <div class="p-2">
                <ul class="nav nav-pills p-0">
                  <li class="nav-item">
                    <a class="nav-link active show" href="#data_anak" data-toggle="tab">Detail Anak</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#data_ortu" data-toggle="tab">Detail Orang Tua</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#biodata" data-toggle="tab">Biodata Anak</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#other_family" data-toggle="tab">Detail Saudara</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#education" data-toggle="tab">Riwayat Pendidikan</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="#detail_document_anak"
                      data-toggle="tab"
                    >Detail Document</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Tab pick -->
            <!-- form start -->
            <form role="form" v-on:submit.prevent="UpdateAnak">
              <div class="card-body">
                <div class="tab-content">
                  <!-- Detail Anak -->
                  <div class="tab-pane active show" id="data_anak">
                    <div class="form-row">
                      <div class="col-2">
                        <label for="inputNo_induk">No induk</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-sort-numeric-down"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.No_induk"
                            type="text"
                            name="No_induk"
                            placeholder="No induk"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('No_induk') }"
                          >
                          <has-error :form="form" field="No_induk"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputNama_lengkap">Nama Lengkap Anak</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-child"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_Lengkap"
                              type="text"
                              name="Nama_lengkap"
                              placeholder="Nama Lengkap Anak"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_Lengkap') }"
                            >
                            <has-error :form="form" field="Nama_Lengkap"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="photo" class="control-label">Foto Anak</label>
                          <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white">
                              <div class="text-center">
                                <div class="widget-user-image-anak">
                                  <img
                                    class="profile-user-img img-fluid img-circle"
                                    :src="getProfilePhoto()"
                                    alt="Foto Anak"
                                  >
                                </div>
                              </div>
                            </div>
                            <input
                              type="file"
                              @change="updateProfile"
                              name="photo"
                              class="form-input"
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat</label>
                          <textarea
                            v-model="form.Alamat"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat"
                            placeholder="Alamat Anak ..."
                            :class="{ 'is-invalid': form.errors.has('Alamat') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat"></has-error>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group">
                              <label for="inputAgama">Agama</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-church"></i>
                                  </span>
                                </div>
                                <select
                                  v-model="form.Agama"
                                  type="text"
                                  name="Agama"
                                  placeholder="Agama"
                                  class="form-control"
                                  :class="{ 'is-invalid': form.errors.has('Agama') }"
                                >
                                  <option value disabled selected>Pilih Agama</option>
                                  <option value="islam">Islam</option>
                                  <option value="kristen">Kristen</option>
                                  <option value="katolik">Katolik</option>
                                  <option value="hindu">Hindu</option>
                                  <option value="budha">Budha</option>
                                </select>
                                <has-error :form="form" field="Jenis_Kelamin"></has-error>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="inputtempatlahir">Tempat Lahir</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-map"></i>
                                  </span>
                                </div>
                                <input
                                  v-model="form.Tempat_lahir"
                                  type="text"
                                  name="tempat_lahir"
                                  placeholder="Tempat Lahir"
                                  class="form-control"
                                  :class="{ 'is-invalid': form.errors.has('tempat_lahir') }"
                                >
                                <has-error :form="form" field="tempat_lahir"></has-error>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="tgl_lahir">Tanggal Lahir</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-calendar-week"></i>
                                  </span>
                                </div>
                                <date-picker v-model="form.Tgl_lahir" :config="options"></date-picker>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group">
                              <label for="Tgl_masuk_PA">Tanggal Masuk PA</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-calendar-week"></i>
                                  </span>
                                </div>
                                <date-picker v-model="form.Tgl_masuk_PA" :config="options"></date-picker>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="inputtempatlahir">Kelengkapan Surat</label>
                              <select
                                v-model="form.Surat_Kelahiran_Akta"
                                type="text"
                                name="Surat_Kelahiran_Akta"
                                placeholder="Kelengkapan Surat"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('Surat_Kelahiran_Akta') }"
                              >
                                <option value disabled selected>Pilih Kelengkapan Surat</option>
                                <option value="Akta Kelahiran">Akta Kelahiran</option>
                                <option value="Surat Kelahiran">Surat Kelahiran</option>
                              </select>
                              <has-error :form="form" field="Jenis_Kelamin"></has-error>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="inputketeranagAnak">Keterangan Anak</label>
                              <select
                                v-model="form.Keterangan_anak"
                                type="text"
                                name="Keterangan_anak"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('Keterangan_anak') }"
                              >
                                <option value disabled selected>Pilih Keterangan Anak</option>
                                <option value="Panti">Panti</option>
                                <option value="Non-Panti">Non-Panti</option>
                              </select>
                              <has-error :form="form" field="Keterangan_anak"></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputmulaimasukSekolah">Mulai Masuk Sekolah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-calendar-week"></i>
                              </span>
                            </div>
                            <date-picker v-model="form.Mulai_masuk_sekolah" :config="options"></date-picker>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputtempatlahir">Nama Sekolah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-school"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_sekolah"
                              type="text"
                              name="Nama_sekolah"
                              placeholder="Nama sekolah"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_sekolah') }"
                            >
                            <has-error :form="form" field="Nama_sekolah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-school"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Kelas"
                              type="text"
                              name="Kelas"
                              placeholder="Kelas"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Kelas') }"
                            >
                            <has-error :form="form" field="Nama_sekolah"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Sebab Masuk PA</label>
                          <textarea
                            v-model="form.Sebab_masuk_PA"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Sebab_masuk_PA"
                            placeholder="Sebab masuk PA . . ."
                            :class="{ 'is-invalid': form.errors.has('Sebab_masuk_PA') }"
                          ></textarea>
                          <has-error :form="form" field="Sebab_masuk_PA"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Nama Wali</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Nama_Wali"
                            type="text"
                            name="Nama_Wali"
                            placeholder="Nama Wali"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Nama_Wali') }"
                          >
                          <has-error :form="form" field="Nama_Wali"></has-error>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="inputNama_lengkap">Nomor Telepon Wali</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-phone"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nomor_telp_wali"
                              type="text"
                              name="Nomor_telp_wali"
                              placeholder="Nomor telp wali"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nomor_telp_wali') }"
                            >
                            <has-error :form="form" field="Nomor_telp_wali"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat Yang Menitipkan Anak</label>
                          <textarea
                            v-model="form.Alamat_yg_menitipkan"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat_yg_menitipkan"
                            placeholder="Alamat Yang Menitipkan Anak . . ."
                            :class="{ 'is-invalid': form.errors.has('Alamat_yg_menitipkan') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat_yg_menitipkan"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alasan Yang Menitipkan Anak</label>
                          <textarea
                            v-model="form.Alasan_yg_menitipkan"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alasan_yg_menitipkan"
                            placeholder="Alasan Yang Menitipkan Anak . . . "
                            :class="{ 'is-invalid': form.errors.has('Alasan_yg_menitipkan') }"
                          ></textarea>
                          <has-error :form="form" field="Alasan_yg_menitipkan"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Ortu -->
                  <div class="tab-pane" id="data_ortu">
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Nama Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Nama_Ayah"
                            type="text"
                            name="Nama_Ayah"
                            placeholder="Nama Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Nama_Ayah') }"
                          >
                          <has-error :form="form" field="Nama_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputNama_lengkap">Nama Ibu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-user"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_Ibu"
                              type="text"
                              name="Nama_Ibu"
                              placeholder="Nama Ibu"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_Ibu') }"
                            >
                            <has-error :form="form" field="Nama_Ibu"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat Ayah</label>
                          <textarea
                            v-model="form.Alamat_Ayah"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat_Ayah"
                            placeholder="Alamat Ayah . . ."
                            :class="{ 'is-invalid': form.errors.has('Alamat_Ayah') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat Ibu</label>
                          <textarea
                            v-model="form.Alamat_Ibu"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat_Ibu"
                            placeholder="Alamat Ibu . . ."
                            :class="{ 'is-invalid': form.errors.has('Alamat_Ibu') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat_Ibu"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAgamaAyah">Agama Ayah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-church"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Agama_Ayah"
                              type="text"
                              name="Agama_Ayah"
                              placeholder="Agama Ayah"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Agama_Ayah') }"
                            >
                              <option value disabled selected>Pilih Agama</option>
                              <option value="islam">Islam</option>
                              <option value="kristen">Kristen</option>
                              <option value="katolik">Katolik</option>
                              <option value="hindu">Hindu</option>
                              <option value="budha">Budha</option>
                            </select>
                            <has-error :form="form" field="Agama_Ayah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAgamaIbu">Agama Ibu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-church"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Agama_Ibu"
                              type="text"
                              name="Agama_Ibu"
                              placeholder="Agama Ibu"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Agama_Ibu') }"
                            >
                              <option value disabled selected>Pilih Agama</option>
                              <option value="islam">Islam</option>
                              <option value="kristen">Kristen</option>
                              <option value="katolik">Katolik</option>
                              <option value="hindu">Hindu</option>
                              <option value="budha">Budha</option>
                            </select>
                            <has-error :form="form" field="Agama_Ibu"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputStatusAyah">Status Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-book-reader"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Status_Ayah"
                            type="text"
                            name="Status_Ayah"
                            placeholder="Status Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Status_Ayah') }"
                          >
                          <has-error :form="form" field="Status_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputStatusIbu">Status Ibu</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-book-reader"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Status_Ibu"
                            type="text"
                            name="Status_Ibu"
                            placeholder="Status Ibu"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Status_Ibu') }"
                          >
                          <has-error :form="form" field="Status_Ibu"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputPendidikanTerakhir">Pendidikan Ayah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-user-graduate"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Pendidikan_Ayah"
                              type="text"
                              name="Pendidikan_Ayah"
                              placeholder="Pendidikan Ayah"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Pendidikan_Ayah') }"
                            >
                              <option value disabled selected>Pendidikan Terakhir</option>
                              <option value="Sekolah Dasar">SD</option>
                              <option value="Sekolah Menengah Pertama">SMP</option>
                              <option value="Sekolah Menengah Atas">SMA</option>
                              <option value="Strata-1">Strata-1</option>
                              <option value="Strata-2">Strata-2</option>
                            </select>
                            <has-error :form="form" field="Pendidikan_Ayah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputPendidikanTerakhir">Pendidikan Ibu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-user-graduate"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Pendidikan_Ibu"
                              type="text"
                              name="Pendidikan_Ibu"
                              placeholder="Pendidikan Ibu"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Pendidikan_Ibu') }"
                            >
                              <option value disabled selected>Pendidikan Terakhir</option>
                              <option value="Sekolah Dasar">SD</option>
                              <option value="Sekolah Menengah Pertama">SMP</option>
                              <option value="Sekolah Menengah Atas">SMA</option>
                              <option value="Strata-1">Strata-1</option>
                              <option value="Strata-2">Strata-2</option>
                            </select>
                            <has-error :form="form" field="Pendidikan_Ibu"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Pekerjaan Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-briefcase"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Pekerjaan_Ayah"
                            type="text"
                            name="Pekerjaan_Ayah"
                            placeholder="Pekerjaan Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Pekerjaan_Ayah') }"
                          >
                          <has-error :form="form" field="Pekerjaan_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputNo_induk">Pekerjaan Ibu</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-briefcase"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Pekerjaan_Ibu"
                            type="text"
                            name="Pekerjaan_Ibu"
                            placeholder="Pekerjaan Ibu"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Pekerjaan_Ibu') }"
                          >
                          <has-error :form="form" field="Pekerjaan_Ibu"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Penghasilan Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                          </div>
                          <input
                            v-model="form.Penghasilan_Ayah"
                            type="text"
                            name="Penghasilan_Ayah"
                            placeholder="Penghasilan Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Penghasilan_Ayah') }"
                          >
                          <has-error :form="form" field="Penghasilan_Ayah"></has-error>
                          <div class="input-group-prepend">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputNo_induk">Penghasilan Ibu</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                          </div>
                          <input
                            v-model="form.Penghasilan_Ibu"
                            type="text"
                            name="Penghasilan_Ibu"
                            placeholder="Penghasilan Ibu"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Penghasilan_Ibu') }"
                          >
                          <has-error :form="form" field="Penghasilan_Ibu"></has-error>
                          <div class="input-group-prepend">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Tanggungan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-child"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Tanggungan"
                            type="text"
                            name="Tanggungan"
                            placeholder="Tanggungan"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Tanggungan') }"
                          >
                          <has-error :form="form" field="Tanggungan"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputNo_induk">Perumahan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-home"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Perumahan"
                            type="text"
                            name="No_induk"
                            placeholder="Perumahan"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Perumahan') }"
                          >
                          <has-error :form="form" field="Perumahan"></has-error>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="inputAlamat">Latar Belakang Permasalahan</label>
                      <textarea
                        v-model="form.Latar_Belakang_Permasalahan"
                        rows="4"
                        class="form-control"
                        type="text"
                        name="Latar_Belakang_Permasalahan"
                        placeholder="Latar Belakang Permasalahan ..."
                        :class="{ 'is-invalid': form.errors.has('Latar_Belakang_Permasalahan') }"
                      ></textarea>
                      <has-error :form="form" field="Latar_Belakang_Permasalahan"></has-error>
                    </div>
                  </div>
                  <!-- Biodata Anak -->
                  <div class="tab-pane" id="biodata">
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputTinggiBadan">Tinggi Badan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-text-height"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Tinggi_Badan"
                              type="text"
                              name="Tinggi_Badan"
                              placeholder="Tinggi Badan"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Tinggi_Badan') }"
                            >
                            <has-error :form="form" field="Tinggi_Badan"></has-error>
                            <div class="input-group-prepend">
                              <span class="input-group-text">CM</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputBeratBadan">Berat Badan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-weight"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Berat_Badan"
                              type="text"
                              name="Berat_Badan"
                              placeholder="Berat Badan"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Berat_Badan') }"
                            >
                            <has-error :form="form" field="Berat_Badan"></has-error>
                            <div class="input-group-prepend">
                              <span class="input-group-text">KG</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputGologanDarah">Golongan Darah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-tint"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Golongan_Darah"
                              type="text"
                              name="Golongan_Darah"
                              placeholder="Pilih Golongan Darah Anak"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Golongan_Darah') }"
                            >
                              <option value disabled selected>Pilih Golongan Darah Anak</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="AB">AB</option>
                              <option value="O">O</option>
                            </select>
                            <has-error :form="form" field="Golongan_Darah"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlergiMakanan">Alergi Makanan</label>
                          <div class="input-group">
                            <textarea
                              v-model="form.Alergi_Makanan"
                              rows="4"
                              class="form-control"
                              type="text"
                              name="Alergi_Makanan"
                              placeholder="Alergi Makanan . . ."
                              :class="{ 'is-invalid': form.errors.has('Alergi_Makanan') }"
                            ></textarea>
                            <has-error :form="form" field="Alergi_Makanan"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlergiMinuman">Alergi Minuman</label>
                          <div class="input-group">
                            <textarea
                              v-model="form.Alergi_Minuman"
                              rows="4"
                              class="form-control"
                              type="text"
                              name="Alergi_Minuman"
                              placeholder="Alergi Minuman . . ."
                              :class="{ 'is-invalid': form.errors.has('Alergi_Minuman') }"
                            ></textarea>
                            <has-error :form="form" field="Alergi_Minuman"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlergiMinuman">Alergi Obat</label>
                          <div class="input-group">
                            <textarea
                              v-model="form.Alergi_Obat"
                              rows="4"
                              class="form-control"
                              type="text"
                              name="Alergi_Obat"
                              placeholder="Alergi Obat . . ."
                              :class="{ 'is-invalid': form.errors.has('Alergi_Obat') }"
                            ></textarea>
                            <has-error :form="form" field="Alergi_Obat"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  Detail Saudara Anak -->
                  <div class="tab-pane" id="other_family">
                    <div class="card card-warning card-outline">
                      <div class="mt-1 m-2 card-tools">
                        <button
                          type="button"
                          class="btn btn-primary float-right"
                          @click="newModalSaudaraAnak()"
                        >
                          Tambah baru
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                      <div class="mt-1 card-body table-responsive p-0">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th>Nama</th>
                              <th>Tempat/Tgl Lahir</th>
                              <th>Sekolah</th>
                              <th>Kelas</th>
                              <th>Keterangan</th>
                              <th>Ubah/Hapus</th>
                            </tr>
                            <tr v-for="fam in children_other_family" :key="fam.id">
                              <td>{{fam.Nama | Uptext}}</td>
                              <td>{{fam.Tempat_lahir | Uptext}}, {{fam.Tgl_lahir | myDate}}</td>
                              <td>{{fam.Sekolah | Uptext}}</td>
                              <td>{{fam.Kelas | Uptext}}</td>
                              <td>{{fam.Keterangan | Uptext}}</td>
                              <td>
                                <button
                                  type="button"
                                  class="btn btn-success btn-sm"
                                  @click="editModalSaudaraAnak(fam)"
                                >
                                  <i class="fa fa-edit"></i>
                                </button>

                                <button
                                  type="button"
                                  class="btn btn-danger btn-sm"
                                  @click="deleteSaudaraAnak(fam.id)"
                                >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!--  Detail document Anak -->
                  <div class="tab-pane" id="detail_document_anak">
                    <div class="card card-danger card-outline">
                      <div class="mt-1 m-2 card-tools">
                        <button
                          type="button"
                          class="btn btn-primary float-right"
                          @click="newModalDocument()"
                        >
                          Tambah baru
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                      <div class="mt-1 card-body table-responsive p-0">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th>Document</th>
                              <th>Asli/FotoCopy</th>
                              <th>Keterangan</th>
                              <th>Ubah/Hapus</th>
                            </tr>
                            <tr v-for="doc in children_document" :key="doc.id">
                              <td>
                                <img
                                  class="profile-user-img img-fluid"
                                  :src="'img/document/'+doc.Document"
                                  alt="User profile picture"
                                >
                              </td>
                              <td>{{doc.Asli_Fotocopy | Uptext}}</td>
                              <td>{{doc.Keterangan | Uptext}}</td>
                              <td>
                                <button
                                  type="button"
                                  class="btn btn-success btn-sm"
                                  @click="editModalDocument(doc)"
                                >
                                  <i class="fa fa-edit"></i>
                                </button>

                                <button
                                  type="button"
                                  class="btn btn-danger btn-sm"
                                  @click="deleteDocument(doc.id)"
                                >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- Riwayat Pendidikan Anak -->
                  <div class="tab-pane" id="education">
                    <div class="card card-success card-outline">
                      <div class="mt-1 m-2 card-tools">
                        <button
                          type="button"
                          class="btn btn-primary float-right"
                          @click="newModalRiwayatPendidikan()"
                        >
                          Tambah baru
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                      <div class="mt-1 card-body table-responsive p-0">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th>Mulai Masuk Sekolah</th>
                              <th>Nama Sekolah</th>
                              <th>Alamat Sekolah</th>
                              <th>Ubah/Hapus</th>
                            </tr>
                            <tr v-for="edu in children_education" :key="edu.id">
                              <td>{{edu.Tahun_Ajaran | myDate}}</td>
                              <td>{{edu.Nama_Sekolah | Uptext}}</td>
                              <td>{{edu.Alamat_Sekolah | Uptext}}</td>
                              <td>
                                <button
                                  type="button"
                                  class="btn btn-success btn-sm"
                                  @click="editModalRiwayatPendidikan(edu)"
                                >
                                  <i class="fa fa-edit"></i>
                                </button>

                                <button
                                  type="button"
                                  class="btn btn-danger btn-sm"
                                  @click="deleteRiwayatPendidikan(edu.id)"
                                >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button
                  type="submit"
                  class="btn btn-success float-right"
                  @click="UpdateAnak()"
                >Ubah Data Anak</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>

        <!-- Modal Saudara Anak -->
        <div
          class="modal fade"
          id="addNewSaudara"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addNewLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Tambah Detail Saudara</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Ubah Detail Saudara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateSaudaraAnak() :createSaudaraAnak()">
                <div class="modal-body">
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="inputKeteranganSaudara">Keterangan Saudara</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <select
                            v-model="form_other_family.Keterangan"
                            type="text"
                            name="Keterangan"
                            placeholder="Keterangan Saudara"
                            class="form-control"
                            :class="{ 'is-invalid': form_other_family.errors.has('Keterangan') }"
                          >
                            <option value disabled selected>Pilih</option>
                            <option value="adik">Adik</option>
                            <option value="kakak">Kakak</option>
                          </select>
                          <has-error :form="form_other_family" field="Keterangan"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="inputNamaSaudara">Nama</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipNamaSaudara">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form_other_family.Nama"
                            type="text"
                            name="Nama"
                            placeholder="Nama Saudara"
                            class="form-control"
                            :class="{ 'is-invalid': form_other_family.errors.has('Nama') }"
                          >
                          <has-error :form="form_other_family" field="Nama"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="inputTempatLahirSaudara">Tempat Lahir</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipTempatLahirSaudara">
                              <i class="fas fa-map"></i>
                            </span>
                          </div>
                          <input
                            v-model="form_other_family.Tempat_lahir"
                            type="text"
                            name="Tempat_lahir"
                            placeholder="Tempat lahir saudara"
                            class="form-control"
                            :class="{ 'is-invalid': form_other_family.errors.has('Tempat_lahir') }"
                          >
                          <has-error :form="form_other_family" field="Tempat_lahir"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="inputTglLahirSAudara">Tanggal Lahir</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-calendar-week"></i>
                            </span>
                          </div>
                          <date-picker
                            v-model="form_other_family.Tgl_lahir"
                            :config="options"
                            name="Tgl_lahir"
                            placeholder="Masukkan Tanggal"
                            class="form-control"
                            :class="{ 'is-invalid': form_other_family.errors.has('Tgl_lahir') }"
                          ></date-picker>
                          <has-error :form="form_other_family" field="Tgl_lahir"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="inputSekolahSaudara">Sekolah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-school"></i>
                            </span>
                          </div>
                          <select
                            v-model="form_other_family.Sekolah"
                            type="text"
                            name="Sekolah"
                            placeholder="Sekolah saudara"
                            class="form-control"
                            :class="{ 'is-invalid': form_other_family.errors.has('Sekolah') }"
                          >
                            <option value disabled selected>Pilih</option>
                            <option value="Belum Sekolah">Belum Sekolah</option>
                            <option value="Sekolah Dasar">SD</option>
                            <option value="Sekolah Menengah Pertama">SMP</option>
                            <option value="Sekolah Menengah Atas">SMA</option>
                          </select>
                          <has-error :form="form_other_family" field="Sekolah"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="inputKelasSaudara">Kelas</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipKelasSaudara">
                              <i class="fas fa-school"></i>
                            </span>
                          </div>
                          <input
                            v-model="form_other_family.Kelas"
                            type="text"
                            name="Kelas"
                            placeholder="Kelas"
                            class="form-control"
                            :class="{ 'is-invalid': form_other_family.errors.has('Kelas') }"
                          >
                          <has-error :form="form_other_family" field="Kelas"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Ubah</button>
                  <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Document Anak -->
        <div
          class="modal fade"
          id="addNewDocument"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addNewLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Tambah Detail Document</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Ubah Detail Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateDocument() :createDocument()">
                <div class="modal-body">
                  <div class="form-row">
                    <div class="col-5">
                      <div class="form-group">
                        <label for="photo" class="control-label">Foto Anak</label>
                        <div class="card card-widget widget-user">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header text-white">
                            <div class="text-center">
                              <div
                                v-if="this.form_detail_document.Document === ''"
                                class="widget-user-image-anak"
                              >
                                <img
                                  class="profile-user-img img-fluid"
                                  src="img/document/file.png"
                                  alt="Foto Anak"
                                >
                              </div>
                              <div v-else class="widget-user-image-anak">
                                <img
                                  class="profile-user-img img-fluid"
                                  :src="getPhotoDocument()"
                                  alt="Foto Anak"
                                >
                              </div>
                            </div>
                          </div>
                          <input
                            type="file"
                            @change="updatePhotoDocument"
                            name="Document"
                            class="form-control"
                            :class="{ 'is-invalid': form_detail_document.errors.has('Document') }"
                          >
                          <has-error :form="form_detail_document" field="Document"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="inputAsliFotocopy">Asli/Fotocopy</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-file"></i>
                            </span>
                          </div>
                          <select
                            v-model="form_detail_document.Asli_Fotocopy"
                            type="text"
                            name="Asli_Fotocopy"
                            placeholder="Asli_Fotocopy"
                            class="form-control"
                            :class="{ 'is-invalid': form_detail_document.errors.has('Asli_Fotocopy') }"
                          >
                            <option value disabled selected>Pilih</option>
                            <option value="asli">Asli</option>
                            <option value="fotocopy">Fotocopy</option>
                          </select>
                          <has-error :form="form_detail_document" field="Asli_Fotocopy"></has-error>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <label for="inputKeteranganDocument">Document</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span
                                class="input-group-text"
                                id="validationTooltipKeteranganDocument"
                              >
                                <i class="fas fa-file"></i>
                              </span>
                            </div>
                            <input
                              v-model="form_detail_document.Keterangan"
                              type="text"
                              name="Keterangan"
                              placeholder="Keterangan"
                              class="form-control"
                              :class="{ 'is-invalid': form_detail_document.errors.has('Keterangan') }"
                            >
                            <has-error :form="form_detail_document" field="Keterangan"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Ubah</button>
                  <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Riwayat Pendidikan -->
        <div
          class="modal fade"
          id="addNewPendidikan"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addNewLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5
                  v-show="!editmode"
                  class="modal-title"
                  id="addNewLabel"
                >Tambah Riwayat Pendidikan</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Ubah Riwayat Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form
                @submit.prevent="editmode ? updateRiwayatPendidikan() :createRiwayatPendidikan()"
              >
                <div class="modal-body">
                  <div class="form-row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="inputTglMasuk">Tanggal Masuk Sekolah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-calendar-week"></i>
                            </span>
                          </div>
                          <date-picker
                            v-model="form_education.Tahun_Ajaran"
                            :config="options"
                            name="Tahun_Ajaran"
                            placeholder="Masukkan Tanggal"
                            class="form-control"
                            :class="{ 'is-invalid': form_education.errors.has('Tahun_Ajaran') }"
                          ></date-picker>
                          <has-error :form="form_education" field="Tahun_Ajaran"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="inputNama_lengkap">Nama Sekolah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipNamaSekolahPrepend">
                              <i class="fas fa-school"></i>
                            </span>
                          </div>
                          <input
                            v-model="form_education.Nama_Sekolah"
                            type="text"
                            name="Nama_Sekolah"
                            placeholder="Nama Sekolah"
                            class="form-control"
                            :class="{ 'is-invalid': form_education.errors.has('Nama_Sekolah') }"
                          >
                          <has-error :form="form_education" field="Nama_Sekolah"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAlamatSekolah">Alamat Sekolah</label>
                    <textarea
                      v-model="form_education.Alamat_Sekolah"
                      rows="4"
                      class="form-control"
                      type="text"
                      name="Alamat_Sekolah"
                      placeholder="Alamat Sekolah ..."
                      :class="{ 'is-invalid': form_education.errors.has('Alamat_Sekolah') }"
                    ></textarea>
                    <has-error :form="form_education" field="Alamat_Sekolah"></has-error>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Ubah</button>
                  <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
export default {
  data() {
    return {
      editmode: false,
      userauth: new Form({
        id: "",
        name: ""
      }),
      children: {},
      children_education: {},
      children_other_family: {},
      children_document: {},
      form: new Form({
        //Detail Anak
        id: "",
        id_user: "",
        No_induk: "",
        Nama_Lengkap: "",
        Agama: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date().useCurrent,
        Surat_Kelahiran_Akta: "",
        Alamat: "",
        Mulai_masuk_sekolah: new Date().useCurrent,
        Nama_sekolah: "",
        Kelas: "",
        Tgl_masuk_PA: new Date().useCurrent,
        Administrasi_sekolah: "",
        Sebab_masuk_PA: "",
        Keterangan_anak: "",
        Nama_Wali: "",
        Nomor_telp_wali: "",
        Photo_anak: "",

        // Detail Ortu
        id_children: "",
        Nama_Ayah: "",
        Alamat_Ayah: "",
        Agama_Ayah: "",
        Status_Ayah: "",
        Pendidikan_Ayah: "",
        Pekerjaan_Ayah: "",
        Penghasilan_Ayah: "",
        Nama_Ibu: "",
        Alamat_Ibu: "",
        Agama_Ibu: "",
        Status_Ibu: "",
        Pendidikan_Ibu: "",
        Pekerjaan_Ibu: "",
        Penghasilan_Ibu: "",
        Tanggungan: "",
        Perumahan: "",
        Latar_Belakang_Permasalahan: "",
        Alamat_yg_menitipkan: "",
        Alasan_yg_menitipkan: "",

        //Biodata Anak
        Tinggi_Badan: "",
        Berat_Badan: "",
        Golongan_Darah: "",
        Alergi_Makanan: "",
        Alergi_Minuman: "",
        Alergi_Obat: ""
      }),
      form_education: new Form({
        id: "",
        id_children: "",
        Tahun_Ajaran: new Date().useCurrent,
        Nama_Sekolah: "",
        Alamat_Sekolah: ""
      }),
      form_detail_document: new Form({
        id: "",
        id_children: "",
        Document: "",
        Asli_Fotocopy: "",
        Keterangan: ""
      }),
      form_other_family: new Form({
        id: "",
        id_children: "",
        Nama: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date().useCurrent,
        Sekolah: "",
        Kelas: "",
        Keterangan: ""
      }),
      options: {
        format: "YYYY/MM/DD",
        useCurrent: true
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.loadRiwayatpendidikan();
    this.loadSaudaraAnak();
    this.loadDocument();
    Fire.$on("AfterCreated", () => {
      this.loadRiwayatpendidikan();
      this.loadSaudaraAnak();
      this.loadDocument();
    });
    axios.get(`api/edit-anak/${this.$route.params.idanak}`).then(response => {
      this.form.fill(response.data.children[0]);
    });
  },
  methods: {
    UpdateAnak() {
      this.$Progress.start();
      this.form
        .put("api/children/" + this.$route.params.idanak)
        .then(() => {
          toast.fire({
            type: "success",
            title: "Data Anak Berhasil diubah"
          });
          this.$router.push("data-anak");
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Ada yang salah cek kembai form"
          });
        });
    },
    getProfilePhoto() {
      let photo =
        this.form.Photo_anak.length > 200
          ? this.form.Photo_anak
          : "img/photo_anak/" + this.form.Photo_anak;
      return photo;
    },
    updateProfile(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "File terlalu besar pilih yang lain"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form.Photo_anak = reader.result;
      };
      reader.readAsDataURL(file);
    },
    loadRiwayatpendidikan() {
      if (this.$gate.isAdminOrUser()) {
        axios
          .get(`api/edit-anak/${this.$route.params.idanak}`)
          .then(
            ({ data }) => (this.children_education = data.children_education)
          );
      }
    },
    newModalRiwayatPendidikan() {
      this.editmode = false;
      this.form_education.reset();
      $("#addNewPendidikan").modal("show");
    },
    editModalRiwayatPendidikan(edu) {
      this.editmode = true;
      this.form_education.reset();
      $("#addNewPendidikan").modal("show");
      this.form_education.fill(edu);
    },
    createRiwayatPendidikan() {
      this.form_education.id_children = this.$route.params.idanak;
      this.$Progress.start();
      this.form_education
        .post("api/children_education")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNewPendidikan").modal("hide");
          toast.fire({
            type: "success",
            title: "Riwayat Pendidikan Telah Ditambahkan"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Ada yang salah cek kembali"
          });
        });
    },
    updateRiwayatPendidikan() {
      this.$Progress.start();
      this.form_education
        .put("api/children_education/" + this.form_education.id)
        .then(() => {
          $("#addNewPendidikan").modal("hide");
          swal.fire(
            "Diubah!",
            "Riwayat Pendidikan berhasil diubah.",
            "success"
          );
          Fire.$emit("AfterCreated");
          this.$Progress.finish();
        })
        .catch(() => {
          swal.fire("Gagal!", "Ada yang salah cek kembali form", "warning");
          this.$Progress.fail();
        });
    },
    deleteRiwayatPendidikan(id) {
      swal
        .fire({
          title: "Anda yakin Menghapus Data ini?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form_education
              .delete("api/children_education/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Fail!", "Something Wrong", "warning");
              });
          }
        });
    },
    loadSaudaraAnak() {
      if (this.$gate.isAdminOrUser()) {
        axios
          .get(`api/edit-anak/${this.$route.params.idanak}`)
          .then(
            ({ data }) =>
              (this.children_other_family = data.children_detail_other_families)
          );
      }
    },
    newModalSaudaraAnak() {
      this.editmode = false;
      this.form_other_family.reset();
      $("#addNewSaudara").modal("show");
    },
    editModalSaudaraAnak(fam) {
      this.editmode = true;
      this.form_other_family.reset();
      $("#addNewSaudara").modal("show");
      this.form_other_family.fill(fam);
    },
    createSaudaraAnak() {
      this.form_other_family.id_children = this.$route.params.idanak;
      this.$Progress.start();
      this.form_other_family
        .post("api/children_family")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNewSaudara").modal("hide");
          toast.fire({
            type: "success",
            title: "Detail Saudara Telah Ditambahkan"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Ada yang salah cek kembali"
          });
        });
    },
    updateSaudaraAnak() {
      this.$Progress.start();
      this.form_other_family
        .put("api/children_family/" + this.form_other_family.id)
        .then(() => {
          $("#addNewSaudara").modal("hide");
          swal.fire("Updated!", "Your file has been Updated.", "success");
          Fire.$emit("AfterCreated");
          this.$Progress.finish();
        })
        .catch(() => {
          swal.fire("Fail!", "Something Wrong", "warning");
          this.$Progress.fail();
        });
    },
    deleteSaudaraAnak(id) {
      swal
        .fire({
          title: "Anda yakin Menghapus Data ini?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form_other_family
              .delete("api/children_family/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Fail!", "Something Wrong", "warning");
              });
          }
        });
    },
    loadDocument() {
      if (this.$gate.isAdminOrUser()) {
        axios
          .get(`api/edit-anak/${this.$route.params.idanak}`)
          .then(
            ({ data }) =>
              (this.children_document = data.children_detail_document)
          );
      }
    },
    newModalDocument() {
      this.editmode = false;
      this.form_detail_document.reset();
      $("#addNewDocument").modal("show");
    },
    editModalDocument(doc) {
      this.editmode = true;
      this.form_detail_document.reset();
      $("#addNewDocument").modal("show");
      this.form_detail_document.fill(doc);
    },
    getPhotoDocument() {
      let photo =
        this.form_detail_document.Document.length > 200
          ? this.form_detail_document.Document
          : "img/document/" + this.form_detail_document.Document;
      return photo;
    },
    updatePhotoDocument(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "File terlalu besar"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form_detail_document.Document = reader.result;
      };
      reader.readAsDataURL(file);
    },
    createDocument() {
      this.form_detail_document.id_children = this.$route.params.idanak;
      this.$Progress.start();
      this.form_detail_document
        .post("api/children_document")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNewDocument").modal("hide");
          toast.fire({
            type: "success",
            title: "Detail Document Anak Telah Ditambahkan"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Ada yang salah cek kembali"
          });
        });
    },
    updateDocument() {
      this.$Progress.start();
      this.form_detail_document
        .put("api/children_document/" + this.form_detail_document.id)
        .then(() => {
          $("#addNewDocument").modal("hide");
          swal.fire("Updated!", "Your file has been Updated.", "success");
          Fire.$emit("AfterCreated");
          this.$Progress.finish();
        })
        .catch(() => {
          swal.fire("Fail!", "Something Wrong", "warning");
          this.$Progress.fail();
        });
    },
    deleteDocument(id) {
      swal
        .fire({
          title: "Anda yakin Menghapus Data ini?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form_detail_document
              .delete("api/children_document/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Fail!", "Something Wrong", "warning");
              });
          }
        });
    }
  }
};
</script>
