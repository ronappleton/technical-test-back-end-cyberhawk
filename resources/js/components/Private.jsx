import {Navigate, Outlet} from 'react-router-dom';

const Private = ({children}) => {
    const token = localStorage.getItem('token');

    if (!token) {
        return <Navigate to="/login" />
    }

    return children ? children : <Outlet />
}

export default Private;
