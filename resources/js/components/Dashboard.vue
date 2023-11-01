<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">User :</span>
              <span class="info-box-number">{{ userCount }}</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Produk :</span>
              <span class="info-box-number">{{ productCount }}</span>
            </div>
          </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kategori :</span>
              <span class="info-box-number">{{ categoryCount }}</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Tag :</span>
              <span class="info-box-number">{{ tagCount }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">

      </div> 
      <div class="col-md-5">
       
      </div> 
    </div>
  </section>
</template>

<script>
    import axios from 'axios';

    export default {
    data() {
        return {
        userCount: 0,
        productCount: 0,
        categoryCount: 0,
        tagCount: 0,
        };
    },
    mounted() {
        console.log('Component mounted.');
    },

    created() {
    this.fetchProductCount();
    this.fetchUserCount();
    this.fetchCategoryCount();
    this.fetchTagCount();
    },
    methods: {
        fetchUserCount() {
        axios.get('/api/getUserCount')
            .then(response => {
            this.userCount = response.data.count;
            })
            .catch(error => {
            console.error(error);
            });
        },
        fetchProductCount() {
        axios.get('/api/getProductCount')
            .then(response => {
            this.productCount = response.data.count;
            })
            .catch(error => {
            console.error(error);
            });
        },
        fetchCategoryCount() {
        axios.get('/api/getCategoryCount')
            .then(response => {
            this.categoryCount = response.data.count;
            })
            .catch(error => {
            console.error(error);
            });
        },
        fetchTagCount() {
        axios.get('/api/getTagCount')
            .then(response => {
            this.tagCount = response.data.count;
            })
            .catch(error => {
            console.error(error);
            });
        },
    },
    };
</script>