function calculator(...number){
    let sum = 0;
    for(let i of number){
        sum = sum + i;
    }
    consol.log(sum);
}
calculator(1,2,3,4);