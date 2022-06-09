
$(document).ready(function () {
    // ############### show tree data ##################
    //   get all optgroup as backup
    var all = $('.cclass').html();
    var all2 = $('.ccclass').html();

    //  console.log(all);
    console.log(all2);
    // clear all optgroup
    $('optgroup').remove();

    // // on change city
    $(".pclass").change(function () {
        // clear all optgroup
        $('optgroup').remove();
        // populate all location
        $('#cid').append(all);
        console.log($('.cclass'));
        var c = this.value;
        var active = 'optgroup[label="' + c + '"]';
        // remove all except selected city
        $(active).siblings().remove();
        $(active).contents().unwrap();
    });

    $(".cclass").change(function () {

        // clear all optgroup
        $('optgroup').remove();
        // populate all location
        $('#ccid').append(all2);
        console.log($('.ccclass'));
        var c = this.value;
        var active = 'optgroup[label="' + c + '"]';
        // remove all except selected child
        $(active).siblings().remove();
        $(active).contents().unwrap();
    });

    // ############### end- show tree data ################## 
});
