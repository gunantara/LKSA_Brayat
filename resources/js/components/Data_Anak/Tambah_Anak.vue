<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2" v-if="$gate.isAdmin()">
        <div class="col md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Anak</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
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
                          <option value="kristen">Hindu</option>
                          <option value="kristen">Budha</option>
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
                  <div class="col">
                    <div class="form-group">
                      <label for="inputAlamat">Keterangan Anak</label>
                      <textarea
                        v-model="form.Keterangan_anak"
                        rows="4"
                        class="form-control"
                        type="text"
                        name="Keterangan_anak"
                        placeholder="Keterangan anak . . . "
                        :class="{ 'is-invalid': form.errors.has('Keterangan_anak') }"
                      ></textarea>
                      <has-error :form="form" field="Keterangan_anak"></has-error>
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
                <br>
                <div>
                  <h3 class="profile-username text-center">Detail Orang Tua Anak</h3>
                </div>
                <br>
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
                          <option value="kristen">Hindu</option>
                          <option value="kristen">Budha</option>
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
                          <option value="kristen">Hindu</option>
                          <option value="kristen">Budha</option>
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
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
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
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
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
              <!-- /.card-body -->
              <div class="card-footer">
                <router-link to="/data-anak">
                  <button
                    type="submit"
                    class="btn btn-primary float-right"
                    @click="createDataAnak()"
                  >Tambah Data Anak</button>
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
      editmode: false,
      childrens: {},
      userauth: new Form({
        id: "",
        name: ""
      }),
      form: new Form({
        //Detail Anak
        id: "",
        id_user: "",
        No_induk: "",
        Nama_Lengkap: "",
        Agama: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date(),
        Surat_Kelahiran_Akta: "",
        Alamat: "",
        Mulai_masuk_sekolah: new Date(),
        Nama_sekolah: "",
        Kelas: "",
        Tgl_masuk_PA: new Date(),
        Administrasi_sekolah: "",
        Sebab_masuk_PA: "",
        Keterangan_anak: "",
        Nama_Wali: "",
        Nomor_telp_wali: "",
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
        Alasan_yg_menitipkan: ""
      }),
      options: {
        format: "YYYY/MM/DD",
        useCurrent: false
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    loaduserAuth() {
      axios.get("api/profile").then(({ data }) => this.userauth.fill(data));
    },
    createDataAnak() {
      // store Children
      this.form.id_user = this.userauth.id;
      this.$Progress.start();
      this.form
        .post("api/children")
        .then(() => {
          toast.fire({
            type: "success",
            title: "Data Anak created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Something wrong when create a Data Anak"
          });
        });
    }
  },
  created() {
    this.loaduserAuth();
    Fire.$on("AfterCreated", () => {
      this.loaduserAuth();
    });
  }
};
</script>

