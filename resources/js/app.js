import App from './components/App'
import { createRoot } from 'react-dom/client';
import axios from "axios";

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

const container = document.getElementById('app');
const root = createRoot(container);

root.render(<App />);
