<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Dashboard')</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
<div id="wrapper">

    @include('admin.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.navbar')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('admin.footer')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
  const notifList = document.getElementById('notif-list');
  const notifCount = document.getElementById('notif-count');

  async function fetchNotifs(){
    try{
     const res = await fetch('#'); 
      const data = await res.json();
      notifList.innerHTML = '';

      if(data.notifications.length === 0){
        notifList.innerHTML = '<div class="p-3 text-center text-muted">No notifications</div>';
      } else {
        data.notifications.forEach(n => {
          notifList.innerHTML += `
            <div class="dropdown-item d-flex align-items-start ${n.read_at ? '' : 'bg-light'}">
              <div class="mr-3"><i class="fas fa-birthday-cake text-pink-500"></i></div>
              <div>
                <div>${n.data.message}</div>
                <small class="text-gray-500">${new Date(n.created_at).toLocaleString()}</small>
              </div>
            </div>`;
        });
      }

      notifCount.textContent = data.unread > 0 ? data.unread : '';
    } catch(err){
      console.error(err);
    }
  }

  fetchNotifs();
  setInterval(fetchNotifs, 15000); 
});
</script>


</body>

</html>
