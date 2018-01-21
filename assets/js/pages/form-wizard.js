$(document).ready(function() {
    var $validator = $("#wizardForm").validate({
        rules: {
            // general
            st_khmer_name: {
                required: true
            },
            txtdob_dd: {
                required: true
		    },
            txtdob_mm: {
                required: true
		    },
            txtdob_yy: {
                required: true//,
                //equalTo: '#exampleInputPassword1'
		    },
            gender: {
                required: true
		    },
            time_study: {
                required: true
            },
            section: {
                required: true
            },


            email: {
                required: true,
                email: true
            },
            father_name_kh: {
                required: true
            },
            mother_name_kh: {
                required: true
		    },

		    exampleInputSecurity: {
                required: true,
                number: true
		    },
		    exampleInputHolder: {
                required: true
            },
		    exampleInputExpiration: {
                required: true,
                date: true
            },
		    exampleInputCsv: {
                required: true,
                number: true
            }
        }
    });
 
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            // checking button for last tab
            if($total==$current){
                $("#btnSaveNewEnrollment").css('display','');
                $("#btnCloseEnrollment").css('display','');
                $("#btnNext").css('display','none');
            }else{
                $("#btnCloseEnrollment").css('display','none');
                $("#btnSaveNewEnrollment").css('display','none');
                $("#btnNext").css('display','');
            }

            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
        },
        'onNext': function(tab, navigation, index) {
            var $valid = $("#wizardForm").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
        'onTabClick': function(tab, navigation, index) {
            var $valid = $("#wizardForm").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
    });
    
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true
    });
});