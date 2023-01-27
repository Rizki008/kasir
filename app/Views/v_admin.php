<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>

            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>44</h3>

            <p>Satuan</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3>65</h3>

            <p>User</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-primary">
        <span class="info-box-icon"><i class="fas fa-tag"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Income Hari ini</span>
            <span class="info-box-number">Rp. 5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-fuchsia">
        <span class="info-box-icon"><i class="fas fa-tag"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Income Bulan ini</span>
            <span class="info-box-number">Rp. 5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-warning">
        <span class="info-box-icon"><i class="fas fa-tag"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Income Tahun Ini</span>
            <span class="info-box-number">RP. 5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>

<div class="col-md-12">
    <canvas id="myChart" width="100%" height="30px"></canvas>
</div>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>