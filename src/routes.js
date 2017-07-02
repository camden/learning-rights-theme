import React from 'react';
import { Route } from 'react-router-dom';

import Main from './components/Main';

const Routes = () => {
  return (
    <div>
      <Route path="/" component={Main} />
    </div>
  );
};

export default Routes;
