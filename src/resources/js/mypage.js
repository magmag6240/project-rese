function check_delete(){
        if(confirm('この予約を削除しますか？')){
            return true;
        }else{
            alert('削除はキャンセルされました');
            return false;
        }
    }