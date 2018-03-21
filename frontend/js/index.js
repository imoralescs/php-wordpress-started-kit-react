import React from 'react';
import { render } from 'react-dom';
import App from './components/App';

const renderApp = AppView => {
    render(
        <AppView />,
        document.getElementById('root')
    );
}

renderApp(App);