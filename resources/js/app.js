require('./bootstrap');
import '../css/app.css';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Main from './Main';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import { BrowserRouter } from 'react-router-dom';


const queryClient = new QueryClient({
    defaultOptions: {
      queries: {
        refetchOnWindowFocus: false,
        },
    },
});


ReactDOM.createRoot(document.getElementById("message")).render(
    <React.StrictMode>
      <BrowserRouter>
        <QueryClientProvider client={queryClient}>
          <Main />
        </QueryClientProvider>
      </BrowserRouter>
    </React.StrictMode>
);
