<div style="width: 100%;height: 100%;">
  <div style="display: flex;margin-left: 30px;">
    <a href="/beranda" style="color: black;margin-top: 14px;text-decoration:none !important">Beranda</a>
    <p style="margin-left: 5px;color: black;">/</p>
    <p style="color: #29B6F6;margin-left: 5px;">Profile</p>
  </div>

  <div class="container" style="margin-top: 20px;text-align: center;">
    <div class="card" style="border: solid 1px;width: 600px;height: 475px;margin-left: 458px;">
      <img src="/assets/img/view2.jpg" class="card-img-top" alt="..." style="border-radius: 130px;width: 260px;height: 260px;margin-top: 45px;">
      <div class="card-body" style="margin-right: 202px; margin-left: 164px" >
        <div style="display: flex">
          <p>Username</p>
          <p style="margin-left: 50px">:</p>
          <p style="margin-left: 10px"> {{ Auth::user()->username }} </p>
        </div>
        <div style="display: flex">
          <p>Full Name</p>
          <p style="margin-left: 47px">:</p>
          <p style="margin-left: 10px"> {{ Auth::user()->name }} </p>
        </div>
        <div style="display: flex">
          <p>Email</p>
          <p style="margin-left: 78px">:</p>
          <p style="margin-left: 10px"> {{ Auth::user()->email }} </p>
        </div>
      </div>
    </div>
  </div>
</div>