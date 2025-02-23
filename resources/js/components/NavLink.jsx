import React from 'react';
import PropTypes from 'prop-types';
import {
  Link,
  useMatch,
  useResolvedPath,
} from 'react-router-dom';
import useAuthorisationService from '../hooks/services/useAuthorisationService';

function classNames(...classes) {
  return classes.filter(Boolean).join(' ');
}

function NavLink({ item, permissions, ability }) {
  const resolved = useResolvedPath(item.href);
  const match = useMatch(`${resolved.pathname}*`);
  const { can } = useAuthorisationService();

  if (ability && !can(ability, permissions)) return null;

  return (
    <Link
      to={item.href}
      className={classNames(
        match
          ? 'bg-indigo-800 text-white'
          : 'text-white hover:bg-indigo-600 hover:bg-opacity-75',
        'group flex items-center px-2 py-2 text-base font-medium rounded-md',
      )}
    >
      <item.icon className="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" aria-hidden="true" />
      {item.name}
    </Link>
  );
}

NavLink.propTypes = {

};

export default NavLink;
