@extends('layout.master') <!-- Make sure the path matches your folder structure -->

@section('content')

<div class="detail_title">
    <h1>General Cleaning</h1>

</div>
<div class="detail_desc">
    <div class="detail_desc_img">
        <!-- Content for general cleaning details goes here -->
        <img src="{{asset('assets/images/cleaning1.jpg')}}" alt="">
    </div>
    <div class="detail_desc_text">
        <article>
            General Cleaning adalah layanan bersih-bersih rumah atau home basic cleaning service yang bisa Anda  pesan melalui aplikasi KliknClean dengan harga  mulai dari Rp 65k/jam
        </article>
        <ul>
            <li>Layanan pembersihan untuk apartemen, rumah dan kantor yang dilakukan profesional cleaners. </li>
            <li>Jangkauan layanan Home Cleaning Service atau pembersihan dari KliknClean tersedia di kota Bali, Bandung, Bekasi, Bogor, Depok, Jakarta, Medan, Pontianak, Surabaya, Tangerang.</li>
            <li>Peralatan lengkap.</li>
            <li>Tenaga kerja berpengalaman dan terpercaya.</li>
        </ul>

        <button>
            Pesan Sekarang
        </button>
        
    </div>
</div>
@endsection
