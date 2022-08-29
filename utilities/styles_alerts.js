function send_alert(
    values={
        title:null,
        text: null, 
        icon: null
    },
){
    swal({
        title: values['title'],
        text: values['text'],
        icon: values['icon']
    })
}