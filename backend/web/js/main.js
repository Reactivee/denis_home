function confirmLoading(item) {

    if (confirm(item)) {
        $('.full_screen').removeClass('show_spinner')
        return true
    } else {
        return false;

    }

}
function setLoading(){
    $('.full_screen').removeClass('show_spinner');
}