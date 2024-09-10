<?php
require 'layout/header.php';
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Courses</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Courses</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <section id="pricing" class="pricing section">

    <div class="container">

      <div class="row gy-3" id="courseAppendPlace">

        <!-- <div class="col-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <div class="pricing-item featured">
            <h3 style="font-size: 1.5rem;">Business</h3>
            <div style="font-size: 1rem;">
              <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos a, nobis quis error praesentium enim?</p>
              <ul style="font-size: 1rem;" class="m-0">
                <li>Duration: 1 months</li>
                <li>Short Name: </li>
              </ul>
            </div>
            <div class="btn-wrap">
              <a href="contact.php" class="btn-buy">Contact Us</a>
            </div>
          </div>
        </div> -->
        <!-- End courses Item -->

      </div>

    </div>
  </section>

</main>
<script>
  $(document).ready(function() {
    $.ajax({
      url: `<?= BACKEND_URL ?>courses/get_all`,
      method: 'GET',
      beforeSend: function() {
        $('.loading').show();
      },
      // data: {
      //   date: moment().format('YYYY-MM-DD'),
      // }
    }).then((data) => {
      $('.loading').hide();

      if (data.code == 200) {
        $("#courseAppendPlace").append(
          data.data.map((row) => {
            return `<div class="col-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <div class="pricing-item border">
            <h3 style="font-size: 1.5rem;">${row.full_name}</h3>
            <div style="font-size: 1rem;">
              <p class="m-0">${row.details}</p>
              <ul style="font-size: 1rem;" class="m-0">
                <li>Duration: 1 ${row.duration_in_month}</li>
                <li>Short Name: ${row.short_name}</li>
              </ul>
            </div>
            <div class="btn-wrap">
              <a href="contact.php" class="btn-buy">Contact Us</a>
            </div>
          </div>
        </div>`;
          }).join(""));
      } else {
        alert(`Data not found`)
      }


    });
  });
</script>
<?php
require 'layout/footer.php';
?>