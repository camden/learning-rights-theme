import React, { Component } from 'react';

console.log(WORDPRESS);
export default class Main extends Component {
  render() {
    return (
      <div>
        Hello {WORDPRESS.currentUser.data.user_nicename}! Welcome to{' '}
        {WORDPRESS.siteName}!
      </div>
    );
  }
}
