
DROP TABLE accountTable;
DROP TABLE leaderboard;
DROP TABLE answers;
DROP TABLE questions;
DROP TABLE quizzes;
DROP TABLE lessons;
DROP TABLE chapter;


CREATE TABLE accountTable (account_id int, email varchar(255), username varchar(255), pass varchar(255), admin_tw varchar(1));

INSERT INTO accountTable VALUES ('1', 'mineamihai2001@gmail.com', 'mihai', 'parolatest', 'y');
INSERT INTO accountTable VALUES ('2', 'dragoscraciun00@gmail.com', 'dragos', 'parolatest', 'y');
INSERT INTO accountTable VALUES ('3', 'adresa@gmail.com', 'stefan', 'parolatest', 'y');


CREATE TABLE leaderboard (account_id int, username varchar(255), points int);

INSERT INTO leaderboard VALUES('1', 'mihai', '999');
INSERT INTO leaderboard VALUES('2', 'dragos', '999');
INSERT INTO leaderboard VALUES('3', 'stefan', '999');



CREATE TABLE chapter (chapter_id int primary key, numberOfLessons int, name varchar(255));

INSERT INTO chapter VALUES('1', '7', 'Chapter 1:Types of computer systems - Personal Computer');


CREATE TABLE lessons (lesson_id int primary key, content_lesson clob, describe_lesson varchar(255), chapter_id int REFERENCES chapter);

INSERT INTO lessons VALUES('1', 'The personal?computer is one of the most common types of computer due to its versatility and relatively low price. Desktop personal computers have a monitor, a keyboard, a mouse, and a computer?case. The computer case holds the motherboard, fixed or removable disk drives for data storage, the power supply, and may contain other peripheral devices such as modems or network interfaces. Some models of desktop computers integrated the monitor and keyboard into the same case as the processor and power supply. Separating the elements allows the user to arrange the components in a pleasing, comfortable array, at the cost of managing power and data cables between them.

Laptops are designed for portability but operate similarly to desktop PCs. They may use lower-power or reduced size components, with lower performance than a similarly priced desktop computer. Laptops contain the keyboard, display, and processor in one case. The monitor in the folding upper cover of the case can be closed for transportation, to protect the screen and keyboard. Instead of a mouse, laptops may have a touchpad or pointing?stick.

Tablets are portable computers that use a touch?screen as the primary input device. Tablets generally weigh less and are smaller than laptops.

Some tablets include fold-out keyboards, or offer connections to separate external keyboards. Some models of laptop computers have a detachable keyboard, which allows the system to be configured as a touch-screen tablet. They are sometimes called "2-in-1 detachable laptops" or "tablet-laptop hybrids".','introduction', '1');
INSERT INTO lessons VALUES('2', 'The computer case encloses most of the components of the system. It provides mechanical support and protection for internal elements such as the motherboard, disk drives, and power supplies, and controls and directs the flow of cooling air over internal components. The case is also part of the system to control electromagnetic interference radiated by the computer and protects internal parts from electrostatic discharge. Large tower cases provide space for multiple disk drives or other peripherals and usually stand on the floor, while desktop cases provide less expansion room. All-in-one style designs include a video display built into the same case. Portable and laptop computers require cases that provide impact protection for the unit. Hobbyists may decorate the cases with colored lights, paint, or other features, in an activity called case?modding.','case', '1');
INSERT INTO lessons VALUES('3', 'A power supply unit (PSU) converts alternating current (AC) electric power to low-voltage direct current (DC) power for the computer. Laptops can run on built-in rechargeable battery. The PSU typically uses a switched-mode?power?supply (SMPS), with power?MOSFETs (power metal–oxide–semiconductor?field-effect?transistors) used in the converters and regulator circuits of the SMPS.','power supply', '1');
INSERT INTO lessons VALUES('4', 'The motherboard is the main component of a computer. It is a board with integrated?circuitry that connects the other parts of the computer including the CPU, the RAM, the disk drives (CD, DVD, hard?disk, or any others) as well as any peripherals connected via the ports or the expansion?slots. The integrated?circuit (IC) chips in a computer typically contain billions of tiny metal–oxide–semiconductor?field-effect?transistors (MOSFETs).

Components directly attached to or to part of the motherboard include:

The CPU (central processing unit), which performs most of the calculations which enable a computer to function, and is referred to as the brain of the computer. It takes program instructions from random-access?memory (RAM), interprets and processes them and then sends back results so that the relevant components can carry out the instructions. The CPU is a microprocessor, which is fabricated on a metal–oxide–semiconductor (MOS) integrated?circuit (IC) chip. It is usually cooled by a heatsink and fan, or water-cooling system. Many newer CPUs include an on-die graphics?processing?unit (GPU). The clock?speed of the CPU governs how fast it executes instructions and is measured in GHz; typical values lie between 1 GHz and 5 GHz. Many modern computers have the option to overclock the CPU which enhances performance at the expense of greater thermal output and thus a need for improved cooling.
The chipset, which includes the north?bridge, mediates communication between the CPU and the other components of the system, including main memory; as well as south?bridge, which is connected to the north bridge, and supports auxiliary interfaces and buses; and, finally, a Super?I/O chip, connected through the south bridge, which supports the slowest and most legacy components like serial?ports, hardware?monitoring and fan?control.
Random-access?memory (RAM), which stores the code and data that are being actively accessed by the CPU. For example, when a web browser is opened on the computer it takes up memory; this is stored in the RAM until the web browser is closed. It is typically a type of dynamic?RAM (DRAM), such as synchronous?DRAM (SDRAM), where MOS?memory chips store data on memory?cells consisting of MOSFETs and MOS?capacitors. RAM usually comes on dual?in-line?memory?modules (DIMMs) in the sizes of 2GB, 4GB, and 8GB, but can be much larger.
Read-only?memory (ROM), which stores the BIOS that runs when the computer is powered on or otherwise begins execution, a process known as Bootstrapping, or "booting" or "booting up". The ROM is typically a nonvolatile?BIOS?memory chip, which stores data on floating-gate?MOSFET memory cells.
The BIOS (Basic Input Output System) includes boot firmware and power management firmware. Newer motherboards use Unified?Extensible?Firmware?Interface (UEFI) instead of BIOS.
Buses that connect the CPU to various internal components and to expand cards for graphics and sound.
The CMOS (complementary MOS) battery, which powers the CMOS?memory for date and time in the BIOS chip. This battery is generally a watch?battery.
The video?card (also known as the graphics card), which processes computer graphics. More powerful graphics cards are better suited to handle strenuous tasks, such as playing intensive video?games or running computer?graphics software. A video card contains a graphics?processing?unit (GPU) and video?memory (typically a type of SDRAM), both fabricated on MOS?integrated?circuit (MOS IC) chips.
Power?MOSFETs make up the voltage?regulator?module (VRM), which controls how much voltage other hardware components receive.','motherboard', '1');
INSERT INTO lessons VALUES('5', 'An expansion?card in computing is a printed circuit board that can be inserted into an expansion slot of a computer motherboard or backplane to add functionality to a computer system via the expansion bus. Expansion cards can be used to obtain or expand on features not offered by the motherboard.','expansion cards', '1');
INSERT INTO lessons VALUES('6', 'A storage device is any computing hardware and digital?media that is used for storing, porting and extracting data files and objects. It can hold and store information both temporarily and permanently and can be internal or external to a computer, server or any similar computing device. Data storage is a core function and fundamental component of computers.

Fixed media:
Data is stored by a computer using a variety of media. Hard?disk?drives (HDDs) are found in virtually all older computers, due to their high capacity and low cost, but solid-state?drives (SSDs) are faster and more power efficient, although currently more expensive than hard drives in terms of dollar per gigabyte, so are often found in personal computers built post-2007. SSDs use flash?memory, which stores data on MOS?memory chips consisting of floating-gate?MOSFET memory?cells. Some systems may use a disk?array?controller for greater performance or reliability.

Removable media:
To transfer data between computers, an external flash?memory device (such as a memory?card or USB?flash?drive) or optical?disc (such as a CD-ROM, DVD-ROM or BD-ROM) may be used. Their usefulness depends on being readable by other systems; the majority of machines have an optical?disk?drive (ODD), and virtually all have at least one Universal?Serial?Bus (USB) port. Additionally, USB sticks are typically pre-formatted with the FAT32 file system, which is widely supported across operating?systems.','storage devices', '1');
INSERT INTO lessons VALUES('7', 'Input and output devices are typically housed externally to the main computer chassis. The following are either standard or very common to many computer systems.

Input device
Input?devices allow the user to enter information into the system, or control its operation. Most personal computers have a mouse and keyboard, but laptop systems typically use a touchpad instead of a mouse. Other input devices include webcams, microphones, joysticks, and image?scanners.

Output device
Output?devices are designed around the senses of human beings. For example, monitors display text that can be read, speakers produce sound that can be heard. Such devices also could include printers or a Braille?embosser.','input and output peripherals', '1');



CREATE TABLE quizzes(quizz_id int primary key, chapter_id int REFERENCES chapter);

INSERT INTO quizzes VALUES('1', '1');


CREATE TABLE questions(question_id int primary key, question varchar(255), quizz_id int REFERENCES quizzes);

INSERT INTO questions VALUES('1',  'What is the type of computer you just learned about?','1');


CREATE TABLE answers( answer_id int primary key, answer varchar(255), correct varchar(1),question_id int REFERENCES questions);

INSERT INTO answers VALUES('1', 'Personal computer', 'y', '1');
INSERT INTO answers VALUES('2', 'Mainframe computer', 'n', '1');
INSERT INTO answers VALUES('3', 'Supercomputer', 'n', '1');
