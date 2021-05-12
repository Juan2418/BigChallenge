export const goToHome = () => {
    SPA.$router.push('/');
}
export const modifyProduct = (product) => {
    Store.productToModify = product;
    SPA.$router.push('/');
}

export const sendOrder = (products) => {
    axios.post('api/order', products);
}

export default {
    modifyProduct
}

