import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
axios.defaults.headers.common['Accept'] = 'application/json';

export default class AdminProductList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            isLoading: true,
            products: [],
        }
        this.getProducts();
    }

    getProducts() {
        axios.post('/admin/json/product/list').then(response=>{
            this.setState({
                products: response.data.data,
                isLoading: false,
            })
        });
    }

    listProducts() {
        let products = this.state.products;
        return (
            <table className="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        products.map((val, index) => {
                            return (
                                <tr key={val.id}>
                                    <th scope="row">{val.id}</th>
                                    <td><a href={ '/admin/product/view/' + val.slug }>
                                        {val.name}
                                    </a></td>
                                    <td>{val.slug}</td>
                                </tr>
                            );
                        })
                    }
                </tbody>
            </table>


        );
    }

    render() {
        return (
            <div>
                { !this.state.isLoading ? this.listProducts() : '' }
            </div>
        );
    }
}

if (document.getElementById('admin_product_list')) {
    ReactDOM.render(<AdminProductList />, document.getElementById('admin_product_list'));
}
