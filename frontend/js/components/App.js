import React, { Component } from 'react';
import axios from 'axios';

class App extends Component {
    constructor() {
        super();
    }
    
    componentDidMount() {
        axios.get('/wp-json/wp/v2/posts')
            .then(function (response) {
                const {data} = response;
                console.log(data);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
    
    render() {
        return (
            <h1>Wordpress with React</h1>
        );
    }
}

export default App;