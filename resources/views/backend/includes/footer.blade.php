<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2016 - {{ date('Y') }} &copy; {{ config('app.name') }} theme by <a href="#">Zain</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>
</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('theme/assets/js/vendor.min.js')}}"></script>

<script src="{{asset('theme/assets/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('theme/assets/select2/dist/js/select2.min.js')}}"></script>

<!-- knob plugin -->
<script src="{{asset('theme/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('theme/assets/js/app.min.js')}}"></script>

@yield('scripts')
<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true
        });
    });
</script>

</body>

</html>