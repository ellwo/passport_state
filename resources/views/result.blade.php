

<section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="">

            @if($pass!=null)
            <div dir="rtl" class="portfolio-info text-right">
            <h3 class="text-center">معلومات الجواز</h3>
            <ul dir="rtl" class="text-right">
              <li > <strong>الاسم: </strong> {{ $pass->name }}</li>
              <li><strong>الحالة:</strong>{{ $pass->state?'جاهز':'غير جاهز' }}</li>
              <li><strong>رقم الجواز:</strong> {{ $pass->pass_num }}</li>
              <li><strong>تاريخ الميلاد:</strong>{{ $pass->birthday }}</li>
              <li><strong>ملاحظات:</strong>  {{ $pass->state_info }}</li>
              <li><strong>اسم المكتب:</strong>:  {{ $pass->office_name }}</li>

            </ul>
          </div>

          @else
          <div dir="rtl" class="portfolio-info text-right border border-danger">
            <h3 class="text-center text-danger">{{ $pass_num }}<br/>رقم الجواز غير صحيح</h3>


          </div>
          @endif
        </div>

      </div>

    </div>
  </section>
