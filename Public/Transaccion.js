function actualizarInputs(tipoBancoEmisor,tipoBancoReceptor,monto){
    
    //alert('eepale');
    $("#tipoBancoEmisor").val(tipoBancoEmisor);
    $("#tipoBancoReceptor").val(tipoBancoReceptor);
    $("#monto").val(monto);
}

function vaciarInputs(){
    $("#tipoBancoEmisor").val('Seleccione su tipo de banco');
    $("#tipoBancoReceptor").val('Seleccione el tipo de banco');
    $("#monto").val('');
    $("#nroCuentaEmisor").val('');
    $("#nroCuentaReceptor").val('');
    
}

