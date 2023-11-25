import {Navigate, Outlet} from 'react-router-dom';
import useTokenService from "../hooks/services/useTokenService";

const ProtectedRoute = ({children}) => {
    const { retrieveToken } = useTokenService();
    const token = retrieveToken();

    if (!token) {
        return <Navigate to="/login" />
    }

    return children ? children : <Outlet />
}

export default ProtectedRoute;
