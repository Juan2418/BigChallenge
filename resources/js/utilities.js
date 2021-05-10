export const modifyProduct = (product) => {
    Store.productToModify = product;
    SPA.$router.push('/modify');
}

export default {
    modifyProduct
}

