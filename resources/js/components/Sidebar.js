import React from 'react';
//import ReactDOM from 'react-dom';
import { createRoot } from 'react-dom/client';
import { SidebarData } from './SidebarData';

export const Sidebar = () =>
{
    return(
        <div className="Sidebar">
            <ul className="ul pt-2 pb-4 space-y-1 text-sm">
                {SidebarData.map((val, key) => {
                    return (
                        <li className="li dark:bg-gray-800 dark:text-gray-50 cursor-pointer"
                            key={key}
                            >
                            {" "}
                            <a rel="noopener noreferrer" href="#" onClick={()=>{
                                window.location = val.link
                                }}
                                className="a flex items-center p-2 space-x-3 rounded-md"
                            >
                                <span className="span ">{val.icon}</span>
                                <span className="span semibold">{val.title}</span>
                            </a>
                        </li>
                    );
                })}
            </ul>
        </div>
    )
}
//ReactDOM.render(<Sidebar/>,document.getElementById('Sidebar'))
const container = document.getElementById('Sidebar');
const root = createRoot(container); // createRoot(container!) if you use TypeScript
root.render(<Sidebar tab="home" />);
