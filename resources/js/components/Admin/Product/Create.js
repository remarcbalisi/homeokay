import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import CreatableSelect from 'react-select/creatable';

const createOption = (label) => ({
    label,
    value: label.toLowerCase().replace(/\W/g, ''),
});

const defaultOptions = [
    createOption('One'),
    createOption('Two'),
    createOption('Three'),
];

export default class AdminCreateProduct extends Component {
    constructor(props) {
        super(props);
        this.csrf_token = $('meta[name="csrf-token"]').attr('content');
        this.state = {
            isLoading: false,
            options: defaultOptions,
            value: undefined,
        };
        this.handleChange = (newValue, actionMeta) => {
            console.group('Value Changed');
            console.log(newValue);
            console.log(`action: ${actionMeta.action}`);
            console.groupEnd();
            this.state.value = newValue;
            this.setState({ value: newValue });
        };
        this.handleCreate = (inputValue) => {
            this.setState({ isLoading: true });
            console.group('Option created');
            console.log('Wait a moment...');
            setTimeout(() => {
                const { options } = this.state;
                const newOption = createOption(inputValue);
                console.log(newOption);
                console.groupEnd();
                this.setState({
                    isLoading: false,
                    options: [...options, newOption],
                    value: this.state.value,
                });
            }, 1000);
        };
    }

    render() {
        return (
            <form action="/admin/product/store" method="POST">
                <input type="hidden" name="_token" value={this.csrf_token} />
                <div className="form-group">
                    <label htmlFor="productName">Product Name</label>
                    <input type="text" className="form-control" id="product_name" name="name" aria-describedby="productName" placeholder="Enter Product Name" />
                    <small id="productName" className="form-text text-muted">Product name are unique</small>
                </div>
                <div className="form-group">
                    <label htmlFor="description">Description</label>
                    <textarea className="form-control" id="description" name="description" placeholder="Description" rows="3"></textarea>
                </div>
                <div className="form-group">
                    <label htmlFor="tags">Tags</label>
                    <input type="hidden" name="tags" value={JSON.stringify(this.state.value)} />
                    <CreatableSelect
                        isClearable
                        isDisabled={this.state.isLoading}
                        isLoading={this.state.isLoading}
                        onChange={this.handleChange}
                        onCreateOption={this.handleCreate}
                        options={this.state.options }
                        value={this.state.value}
                        isMulti
                    />
                </div>

                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        );
    }
}

if (document.getElementById('admin_create_product')) {
    ReactDOM.render(<AdminCreateProduct />, document.getElementById('admin_create_product'));
}
