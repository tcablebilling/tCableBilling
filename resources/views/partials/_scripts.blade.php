
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- chart js -->
<script src="{{ URL::asset('js/chartjs/chart.min.js') }}"></script>
<!-- bootstrap progress js -->
<script src="{{ URL::asset('js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ URL::asset('js/nicescroll/jquery.nicescroll.min.js') }}"></script>
<!-- icheck -->
<script src="{{ URL::asset('js/icheck/icheck.min.js') }}"></script>

<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>


<!-- Datatables -->
<script src="{{ URL::asset('js/datatables/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('js/datatables/tools/js/dataTables.tableTools.js') }}"></script>
<!-- form validation -->
<script src="{{ URL::asset('js/validator/validator.js') }}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{ URL::asset('js/moment.min2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/datepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/select/select2.full.js') }}"></script>
<script>
    $(document).ready(function () {
        $('select').select2();
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });

    // initialize the validator function
    validator.message['date'] = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('.form-label-left')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
        .on('keyup blur', 'input', function () {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

    // bind the validation to the form submit event
    // $('#send').click('submit');
    // .prop('disabled', true);

    $('.form-label-left').submit(function (e) {
        e.preventDefault();
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();
        return false;
    });

    /* FOR DEMO ONLY */
    $('#vfields').change(function () {
        $('form').toggleClass('mode2');
    }).prop('checked', false);

    $('#alerts').change(function () {
        validator.defaults.alerts = (this.checked) ? false : true;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script>
